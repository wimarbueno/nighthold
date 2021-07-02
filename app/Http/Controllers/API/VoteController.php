<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryPayment;
use App\Models\Shadowlands\Account\Account;
use App\Models\User;
use App\Models\Vote;
use App\Models\Wotlk\Account\AccountDonate;
use App\Models\Wotlk\Account\AccountWotlk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VoteController extends Controller
{
    private function updateVote() {
        $top = file(setting('site.mmotop_stats'));
        Storage::put('vote/vote.txt', $top);
    }

    public function vote() {
        self::updateVote();
        $url = file(storage_path('app/vote/vote.txt'));
        foreach ($url as $item) {
            $vote = explode("\t", $item);
            if ((count($vote) < 5) OR ($vote[3] == '')) {
                continue;
            }
            $check = Vote::where('votes_id', $vote[0])->first();
            if ($check === NULL) {
                Vote::create([
                    'votes_id' => $vote[0],
                    'name' => $vote[3],
                    'balance' => '1',
                    'vote' => $vote[4],
                    'ip' => $vote[2],
                    'voted_at' => $vote[1]
                ]);
            }
        }

        $data = Vote::where('name', Auth::user()->name)->orderBy('created_at', 'desc')->paginate(10);
        $data_done = Vote::where('name', Auth::user()->name)->where('complete', 1)->count();
        $count_vote = $data->count();
        $this->sendVote();
        return response()->json(['error' => false, 'data' => $data, 'vote_count' => $count_vote, 'vote_done' => $data_done]);
    }

    private function sendVote()
    {
        $data = Vote::where('complete', 0)->get();

        if ($data) {
            foreach ($data as $item) {
                $game = User::where('name', $item->name)->first();
                if (isset($game->accountWotlk)) {
                    $account = AccountDonate::where('id', $game->accountWotlk->id)->first();
                    if ($account) {
                        AccountDonate::where('id', $game->accountWotlk->id)->update([
                            'id' => $game->accountWotlk->id,
                            'bonuses' => $account->bonuses,
                            'votes' => $account->votes + $item->vote,
                            'total_votes' => $account->total_votes + 1,
                            'total_bonuses' => $account->total_bonuses,
                        ]);
                    }   else {
                        AccountDonate::create([
                            'id' => $game->accountWotlk->id,
                            'bonuses' => '0',
                            'votes' => $item->vote,
                            'total_votes' => '1',
                            'total_bonuses' => '0',
                        ]);
                    }
                    User::setBalanceVoteUsers($game->id, $game->vote_balance + $item->vote);

                    Vote::where('id', $item->id)->update(['complete' => 1]);

                    HistoryPayment::create([
                        'user_id' => $game->id,
                        'service' => 'vote',
                        'title' => 'Голосование за сервер',
                        'price' => $item->balance,
                        'status' => '1',
                    ]);
                }
            }
        }
    }
}
