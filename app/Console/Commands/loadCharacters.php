<?php

namespace App\Console\Commands;

use App\Models\Characters\Characters;
use App\Models\Wotlk\Account\AccountWotlk;
use App\Services\Utils;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class loadCharacters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'characters:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load characters from world game server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('users')->chunkById(100, function ($users) {
            foreach ($users as $user) {
                $game = AccountWotlk::where('email', $user->email)->first();
                if ($game) {
                    DB::table('user_characters')->where('account', $game->id)->delete();
                    $characters = DB::connection(config('servers.realm')[2]['connectionChatacters'])->table('characters')
                       ->where('account', $game->id)->get();
                    if(!$characters) {
                        continue;
                    }
                    $active_set = false;
                    $index = 0;
                    foreach ($characters as $item) {
                        Characters::create([
                            'bn_id' => $user->id,
                            'account' => $item->account,
                            'index' => $index,
                            'guid' => $item->guid,
                            'name' => $item->name,
                            'class' => $item->class,
                            'class_text' => __('characters.class_' . $item->class),
                            'class_key' => __('characters.class_key_' . $item->class),
                            'race' => $item->race,
                            'race_text' => __('characters.race_' . $item->race),
                            'race_key' => __('characters.key_race_' . $item->race),
                            'gender' => $item->gender,
                            'level' => $item->level,
                            'logout_time' => $item->logout_time,
                            'totaltime' => $item->totaltime,
                            'realmName' => config('servers.realm')[2]['name'],
                            'realmSlug' => config('servers.realm')[2]['slug'],
                            'realmId' => config('servers.realm')[2]['id'],
                            'isActive' => $active_set ? 0 : 1,
                            'faction' => Utils::faction($item->race)['name'] ?? 'unknown',
                            'faction_text' => Utils::faction($item->race)['slug'] ?? 'unknown'
                        ]);
                        ++$index;
                    }
                }
            }
        });
        return 0;
    }
}
