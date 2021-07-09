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

    public function webhook(Request $request)
    {
        $order = HistoryPayment::where('order_id', $request->get('merchant_id'))->first();
        if($order) {

            $merchant = $request->get('merchant'); // id вашего магазина
            $secret_word2 = 'BcPli-brnN328q6D_0GfvopVZCKYgP6C'; // секретный ключ 2

            $sign = md5($merchant.':'.$request->get('amount').':'.$secret_word2.':'.$request->get('merchant_id'));

            if ($sign != $request->get('sign_2')) {
                return abort(404, 'Не найдено');
            }

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

            HistoryPayment::where('order_id', $request->get('merchant_id'))->update(['status' => 1]);

        }

        return false;
    }

    public function success()
    {
        return redirect('/dashboard/payment/index');
    }

    public function fail()
    {
        return redirect('/dashboard/payment/index');
    }

}
