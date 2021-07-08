<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryPayment;
use App\Models\Shadowlands\Account\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maksa988\FreeKassa\Facades\FreeKassa;

class PaymentController extends Controller
{
    public function paymentInfo()
    {
        $data = HistoryPayment::where('user_id', auth()->user()->id)
            ->where('service', 'balance')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $count = HistoryPayment::where('user_id', auth()->user()->id)->where('service', 'balance')->get()->count();
        return response()->json(['error' => false, 'data' => $data, 'count' => $count]);
    }

    public function homePage()
    {
        $data = HistoryPayment::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->where('service', 'balance')
            ->limit(5)
            ->get();
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
            'sum' => 'required|numeric|min:10|strip_min:2'
        ]);

        if ($validator->fails()) {
            return response()->json(['success'=> false, 'message' => 'Минимальная сумма пополнения 10 бонусов', 'class' => 'alert-message error']);
        }

        if ($request->get('option') === 'RoboKassa') {
            $payment = new \Idma\Robokassa\Payment(
                setting('robokassa.payment_user'),
                setting('robokassa.payment_pass_1'),
                setting('robokassa.payment_pass_2'),
                setting('robokassa.payment_test_mode')
            );

            $order = HistoryPayment::create([
                'user_id' => Auth::user()->id,
                'service' => 'balance',
                'title' => 'Пополнение баланса (RoboKassa)',
                'price' => $request->get('sum'),
                'status' => '0',
            ]);

            $payment->setInvoiceId($order->id)
                ->setSum($request->get('sum')*10)
                ->setDescription('Пополнение баланса');

            return response()->json(['success'=> true, 'message' => 'Успешно, Перенаправляем на оплату.', 'class' => 'alert-message success', 'url' => $payment->getPaymentUrl()]);
        }
        elseif ($request->get('option') === 'FreeKassa') {
            $order_id = time();

            HistoryPayment::create([
                'user_id' => Auth::user()->id,
                'service' => 'balance',
                'title' => 'Пополнение баланса (FreeKassa)',
                'price' => $request->get('sum'),
                'status' => '0',
                'order_id' => $order_id
            ]);

            $url = FreeKassa::getPayUrl($request->get('sum')*10, $order_id);
            return response()->json(['success'=> true, 'message' => 'Успешно, перенаправляем на оплату.', 'class' => 'alert-message success', 'url' => $url]);

        }
        elseif ($request->get('option') === 'enot') {

            $MERCHANT_ID   = 21256;                                  // ID магазина
            $SECRET_WORD   = 'IjtjVFni3amKqw_Q8LQyAfUD2j5MxuvY';     // Секретный ключ
            $PAYMENT_ID    = time();                                 // ID заказа (мы используем time(), чтобы был всегда уникальный ID)
            $ORDER_AMOUNT  = $request->get('sum')*10;                                     // Сумма заказа

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
                $newBalance = Account::balance()->balans + $payment->getSum();
                Account::setBalance($newBalance);
                HistoryPayment::where('id', $payment->getInvoiceId())->update(['status' => 1]);
                return redirect('/dashboard/payment/index');
            }

        }
        return redirect('/dashboard/payment/index');
    }
}
