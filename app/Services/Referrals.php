<?php


namespace App\Services;

use App\Models\Characters\Characters;
use App\Models\HistoryPayment;
use App\Models\User;
use App\Models\Web\Referral;
use App\Models\Wotlk\Account\AccountDonate;
use App\Models\Wotlk\Account\AccountWotlk;
use Illuminate\Support\Facades\DB;

class Referrals
{

    public static function init() {
        self::loadReferral();
    }

    private static function loadReferral()
    {
        $user = auth()->user()->referralsNotComplete->where('status', 0);
         if ($user) {
             foreach ($user as $item)  {
                 if ($item) {
                     $users = User::whereId($item->user_id)->first();
                     if($users->email_verified_at) {
                         self::loadReward($item);
                     }
                 }
             }
         }
    }

    private static function loadReward($item)
    {
        $userRefChar = Characters::where('bn_id', $item->user_id)->orderBy('totaltime')->first();
        if ($userRefChar) {
            if($userRefChar->realmId === 2) {
                if (Text::totalTimeReferral($userRefChar->totaltime) >= '12.00') {
                    $game = User::whereId($item->ref_id)->first();
                    if (isset($game->accountWotlk)) {

                        $newAccountBalance = AccountDonate::where('id', $game->accountWotlk->id)->first();
                        if ($newAccountBalance) {
                            AccountDonate::updateOrCreate([
                                'id' => $game->accountWotlk->id,
                            ],[
                                'bonuses' => DB::raw('bonuses + ' . $item->bonus),
                                'votes' => $newAccountBalance->votes,
                                'total_votes' => $newAccountBalance->total_votes,
                                'total_bonuses' => DB::raw('total_bonuses + ' . $item->bonus)
                            ]);
                        } else {
                            AccountDonate::updateOrCreate([
                                'id' => $game->accountWotlk->id,
                            ],[
                                'bonuses' => $item->bonus,
                                'votes' => 0,
                                'total_votes' => 0,
                                'total_bonuses' => $item->bonus
                            ]);
                        }

                        Referral::where('id', $item->id)->update(['status' => 1]);

                        $userGame = AccountWotlk::whereId($item->user_id)->select('id', 'username')->first();

                        HistoryPayment::create([
                            'user_id' => $game->id,
                            'service' => 'balance',
                            'title' => 'Награда за приглашенного(' . $userGame->username . ')',
                            'price' => $item->bonus,
                            'status' => '1',
                        ]);
                    }
                }
            }
        }
    }
}
