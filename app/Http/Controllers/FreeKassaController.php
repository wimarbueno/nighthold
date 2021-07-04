<?php

namespace App\Http\Controllers;

use App\Models\HistoryPayment;
use App\Models\Wotlk\Account\AccountDonate;
use Illuminate\Http\Request;

class FreeKassaController extends Controller
{

    public function searchOrder(Request $request)
    {
        $order = HistoryPayment::where('order_id', $request->get('MERCHANT_ORDER_ID'))->first();
        if($order) {

            $newAccountBalance = AccountDonate::where('id', auth()->user()->accountWotlk->id)->first();
            if ($newAccountBalance) {
                AccountDonate::updateOrCreate([
                    'id' => auth()->user()->accountWotlk->id,
                ],[
                    'bonuses' => $newAccountBalance->bonuses  + $order->price,
                    'total_bonuses' => $newAccountBalance->bonuses  + $order->price
                ]);
            } else {
                AccountDonate::updateOrCreate([
                    'id' => auth()->user()->accountWotlk->id,
                ],[
                    'bonuses' => $order->price,
                    'total_bonuses' => $order->price
                ]);
            }

            HistoryPayment::where('order_id', $request->get('MERCHANT_ORDER_ID'))->update(['status' => 1]);
            return redirect('/dashboard/payment/index');
        }

        return false;
    }
}
