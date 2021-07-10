<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryPayment;
use App\Models\Shadowlands\Account\Account;
use App\Models\User;
use App\Models\Wotlk\Account\AccountDonate;
use App\Models\Wotlk\Account\AccountWotlk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maksa988\FreeKassa\Facades\FreeKassa;

class PaymentController extends Controller
{
    public function topDonateTimer(): \Illuminate\Http\JsonResponse
    {
        $top_timer = Carbon::now()->diffInSeconds(Carbon::now()->endOfDay(), true);
        $top_timer = Carbon::createFromTimestampUTC($top_timer);
        return response()->json(['success'=> false, 'timer' => $top_timer->format('H:i:s')]);
    }
    public function topDonate(): \Illuminate\Http\JsonResponse
    {
        if (setting('top-donaty.donate_status') === 'PUBLISHED') {
            $top_donaters = Cache::rememberForever('top_donaters', function () {
                $donaters = HistoryPayment::select('user_id', DB::raw('SUM(price) as price'))
                    ->whereDate('updated_at', Carbon::today())
                    ->where('service', 'balance')
                    ->where(['status' => 1, ['price', '>', '0']])
                    ->groupBy('user_id')
                    ->limit(3)
                    ->get();
                $data = [];
                foreach ($donaters as $donater) {
                    $user = User::whereId($donater->user_id)->first();
                    $data[] = (object) [
                        'account_id' => $user->id,
                        'username' => $user->name,
                        'bonuses' => $user->price
                    ];
                }

                return $data;
            });
            Cache::forget('top_donaters');
            $last_donater = Cache::get('last_donater');
            return response()->json(['success'=> true, 'data' => $top_donaters, 'last_donater' => $last_donater]);
        }
        return response()->json(['success'=> false, 'data' => null, 'last_donater' => null]);
    }

    public function paymentInfo()
    {
        $data = HistoryPayment::where('user_id', auth()->user()->id)
            ->where('service', 'balance')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $count = HistoryPayment::where('user_id', auth()->user()->id)->where('service', 'balance')->get()->count();
        return response()->json(['error' => false, 'data' => $data, 'count' => $count]);
    }

    public function paymentAdd(Request $request)
    {
        Validator::extend('strip_min', function ($attribute, $value, $parameters, $validator) {

            $validator->addReplacer('strip_min', function($message, $attribute, $rule, $parameters){
                return str_replace([':min'], $parameters, $message);
            });

            return strlen(
                    strip_tags(
                        preg_replace(
                            '/\s+/',
                            '',
                            str_replace('&nbsp;',"", $value)
                        )
                    )
                ) >= $parameters[0];
        });

        $validator = Validator::make($request->all(), [
            'sum' => 'required|numeric|min:'.setting('platnye-uslugi.payment_bonus_min').'|strip_min:2'
        ]);

        if ($validator->fails()) {
            return response()->json(['success'=> false, 'message' => 'Минимальная сумма пополнения '.setting('platnye-uslugi.payment_bonus_min').' бонусов', 'class' => 'alert-message error']);
        }

        if ($request->get('option') === 'RoboKassa') {
            $payment = new \Idma\Robokassa\Payment(
                setting('robokassa.payment_user'),
                setting('robokassa.payment_pass_1'),
                setting('robokassa.payment_pass_2'),
                setting('robokassa.payment_test_mode')
            );

            $order = HistoryPayment::create([
                'user_id' => auth()->user()->id,
                'service' => 'balance',
                'title' => 'Пополнение баланса (RoboKassa)',
                'price' => $request->get('sum'),
                'status' => '0',
            ]);

            $payment->setInvoiceId($order->id)
                ->setSum($request->get('sum')*setting('platnye-uslugi.payment_bonus'))
                ->setDescription('Пополнение баланса');

            return response()->json(['success'=> true, 'message' => 'Успешно, Перенаправляем на оплату.', 'class' => 'alert-message success', 'url' => $payment->getPaymentUrl()]);
        }
        elseif ($request->get('option') === 'FreeKassa') {
            $order_id = time();

            HistoryPayment::create([
                'user_id' => auth()->user()->id,
                'service' => 'balance',
                'title' => 'Пополнение баланса (FreeKassa)',
                'price' => $request->get('sum'),
                'status' => '0',
                'order_id' => $order_id
            ]);

            $url = FreeKassa::getPayUrl($request->get('sum')*setting('platnye-uslugi.payment_bonus'), $order_id);
            return response()->json(['success'=> true, 'message' => 'Успешно, перенаправляем на оплату.', 'class' => 'alert-message success', 'url' => $url]);

        }
        elseif ($request->get('option') === 'enot') {

            $MERCHANT_ID   = 22342;                                  // ID магазина
            $SECRET_WORD   = 'PcEqXegCP7Ar-JMkcjDkfCdBjUduAc6n';     // Секретный ключ
            $PAYMENT_ID    = time();                                 // ID заказа (мы используем time(), чтобы был всегда уникальный ID)
            $ORDER_AMOUNT  = $request->get('sum')*setting('platnye-uslugi.payment_bonus');                                     // Сумма заказа

            $sign = md5($MERCHANT_ID.':'.$ORDER_AMOUNT.':'.$SECRET_WORD.':'.$PAYMENT_ID);  //Генерация ключа
            HistoryPayment::create([
                'user_id' => Auth::user()->id,
                'service' => 'balance',
                'title' => 'Пополнение баланса (Enot)',
                'price' => $request->get('sum'),
                'status' => '0',
                'order_id' => $PAYMENT_ID
            ]);

            $url = 'https://enot.io/pay?m='.$MERCHANT_ID.'&oa='.$ORDER_AMOUNT.'&o='. $PAYMENT_ID
            .'&s='.$sign.'&cr=RUB';
            return response()->json(['success'=> true, 'message' => 'Успешно, перенаправляем на оплату.', 'class' => 'alert-message success', 'url' => $url]);

        }
        return response()->json(['success'=> false, 'message' => 'Неизвестная ошибка, обратитесь к администрации сайта.', 'class' => 'alert-message error']);
    }

    public function store(Request $request)
    {
        $payment = new \Idma\Robokassa\Payment(
            setting('robokassa.payment_user'),
            setting('robokassa.payment_pass_1'),
            setting('robokassa.payment_pass_2'),
            setting('robokassa.payment_test_mode')
        );
        if ($payment->validateSuccess($_GET)) {
            $order = HistoryPayment::find($payment->getInvoiceId());

            if ($payment->getSum() == $order->price) {
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
                Cache::forget('top_donaters');
                Cache::forget('last_donater');

                Cache::rememberForever('last_donater', function ()  {
                    return auth()->user()->name;
                });
                HistoryPayment::where('id', $payment->getInvoiceId())->update(['status' => 1]);
                return redirect('/dashboard/payment/index');
            }

        }
        return redirect('/dashboard/payment/index');
    }
}
