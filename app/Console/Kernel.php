<?php

namespace App\Console;

use App\Models\HistoryPayment;
use App\Models\Vote;
use App\Models\Web\Notification;
use App\Models\Wotlk\Account\AccountDonate;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Cache::forget('top_donaters');
            Notification::where('notification_id', 1)->delete();
        })->cron('0 0 * * *');

        $schedule->call(function () {
            $top_donaters = Cache::get('top_donaters');
            if (!empty($top_donaters)) {
                $item = $top_donaters[0];
                if ($item->bonuses > 0) {
                    $donate = new HistoryPayment;
                    $donate->user_id = $item->account_id;
                    $donate->title = 'Награда за 1 место в данате';
                    $donate->service = 'balance';
                    $donate->price = 10;
                    $donate->status = 1;
                    $donate->save();

                    DB::connection('WotlkAuth')
                        ->table('account_donate')
                        ->where('id', $item->account_id)
                        ->update([
                            'bonuses' => DB::raw('bonuses + 10'),
//                            'total_bonuses' => DB::raw('total_bonuses + 10'),
                        ]);
                }
            }
        })->cron('0 * * * *');

        if (stripos((string) shell_exec('ps xf | grep \'[q]ueue:work\''), 'artisan queue:work') === false) {
            $schedule->command('queue:work --stop-when-empty --tries=10 --timeout=172800 --sleep=30 --backoff=660')
                ->everyMinute();
        }


        $schedule->call(function () {
            $api_queues = ApiQueue::where('status', 'pending')->get();
            if($api_queues->count() > 0) {
                $sockets = [];
                $servers = Server::all();

                foreach ($servers as $server) {
                    if ($server->api_port && $server->api_secret) {
                        $sockets[] = new SocketController($server->address, $server->api_port, $server->api_secret);
                    }
                }
                foreach ($sockets as $socket) {
                    if ($socket->status) {
                        foreach ($api_queues as $job) {
                            $response = $socket->send($job->query);
                            if ($job->status === 'pending') {
                                if ($response->success ?? false) {
                                    $job->status = 'processed';
                                } else {
                                    $job->status = 'error';
                                }
                                $job->save();
                            }
                        }
                    }
                }

            }
        })->everyMinute();

        $schedule->call(function () {
            $votes = Cache::store('database')->get('mmotop_votes');

            if (!empty($votes)) {
                foreach ($votes as $item) {
                    if (!$item->username) {
                        continue;
                    }
                    if (!$item->date->isToday()) {
                        break;
                    }

                    $find = Account::where('username', $item->username)->first();

                    if ($find->id ?? false) {
                        $count_votes_today = Vote::where('account_id', $find->id)->whereDate('click_at', Carbon::today())->count();

                        if ($count_votes_today > 0) {
                            continue;
                        }

                        $vote = new Vote;
                        $vote->account_id = $find->id;
                        $vote->vote_id = $item->id;
                        $vote->ip = $item->ip;
                        $vote->click_at = now();
                        $vote->vote_at = $item->date;

                        try {
                            $vote->saveOrFail();

                            DB::connection('mysql_srv')
                                ->table('account_donate')
                                ->where('id', $find->id)
                                ->update([
                                    'votes' => DB::raw('votes + 1'),
                                    'total_votes' => DB::raw('total_votes + 1'),
                                ]);

                            $api_queue = new ApiQueue;
                            $api_queue->query = '{"type": "update_balance", "account": "' . $find->id . '", "currency": "votes", "amount": "1"}';
                            $api_queue->save();

                            Stat::go('vote');

                            continue;
                        } catch (\Throwable $e) {
                            continue;
                        }
                    }
                }
            }
        })->hourlyAt(58);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
