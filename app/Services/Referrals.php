<?php


namespace App\Services;

use App\Models\Characters\Characters;
use App\Models\HistoryPayment;
use App\Models\User;
use App\Models\Web\Referral;
use App\Models\Wotlk\Account\AccountDonate;
use App\Models\Wotlk\Account\AccountWotlk;

class Referrals
{

    public static function init() {
        self::loadReferral();
    }

    private static function loadReferral()
    {
        $user = auth()->user()->referralsNotComplete;
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
        if($userRefChar->realmId === 2) {
            if (Text::totalTimeReferral($userRefChar->totaltime) >= '9.00') {
                $game = User::whereId($item->ref_id)->first();
                if (isset($game->accountWotlk)) {
                    $account = AccountDonate::where('id', $game->accountWotlk->id)->first();
                    AccountDonate::updateOrCreate([
                        'id' => $item->ref_id,
                    ],[
                        'bonuses' => $account->bonuses + $item->bonus,
                        'total_bonuses' => $account->bonuses + $item->bonus
                    ]);

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
