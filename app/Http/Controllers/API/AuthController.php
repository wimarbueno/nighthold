<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryPayment;
use App\Models\Shadowlands\Account\Account;
use App\Models\Streams;
use App\Models\User;
use App\Models\Web\Referral;
use App\Models\Wotlk\Account\AccountDonate;
use App\Models\Wotlk\Account\AccountWotlk;
use App\Services\Soap\Soap;
use App\Services\Text;
use App\Services\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function streamSend(Request $request) {

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
            'name_user' => 'required|string|min:2|strip_min:2'
        ]);

        if ($validator->fails()) {
            return response()->json(['success'=> false, 'message' => 'Ошибка отправки данных, проверьте заполняемые данные.', 'class' => 'alert-message error']);
        }

        Streams::create([
            'name_user' => $request->get('name_user'),
            'id_user' => auth()->id()
        ]);

        return response()->json(['success'=> true, 'message' => 'Данные успешно отправлены.', 'class' => 'alert-message success']);
    }

    public function stream() {
        $data = auth()->user()->stream;

        if($data) {
            $data['status'] = __('account.stream_'.$data['status']);
            return json_encode([
                'success'=> true,
                'data' => $data
            ], JSON_UNESCAPED_UNICODE|JSON_INVALID_UTF8_IGNORE);
        } else {
            return json_encode([
                'success'=> false
            ], JSON_UNESCAPED_UNICODE|JSON_INVALID_UTF8_IGNORE);
        }
    }

    public function changeQuestion(Request $request) {
        $user = User::where('email', auth()->user()->email)->first();
        $user->update([
            'question' => $request->get('question'),
            'answer' => $request->get('answer')
        ]);
        return response()->json(['success'=> true, 'message' => 'Данные успешно изменены.', 'class' => 'alert-message success']);
    }

    public function changePassword(Request $request) {
        $password = $request->only([
            'oldPassword', 'newPassword', 'confirmPassword'
        ]);

        if ($password['newPassword'] != $password['confirmPassword']) {
            return response()->json(['success'=> false, 'message' => 'Поле «подтвердить пароль» не совпадает.', 'class' => 'alert-message error']);
        }

        if(Hash::check($password['oldPassword'], auth()->user()->password)) {
            $user = User::where('email', auth()->user()->email)->first();
            AccountWotlk::newPassword($user->accountWotlk->username, $password['newPassword']);
            Account::newPasswordBnetSrp6($user->email, $password['newPassword']);
            return response()->json(['success'=> true, 'message' => 'Данные успешно изменены. Для входа на сайт и в игры используйте новый пароль.', 'class' => 'alert-message success']);
        } else {
            return response()->json(['success'=> false, 'message' => 'Старый пароль неверный!', 'class' => 'alert-message error']);
        }
    }

    public function changeName(Request $request) {
        $user = User::where('email', auth()->user()->email)->first();
        $user->update([
            'lastName' => $request->get('last-name'),
            'firstName' => $request->get('first-name'),
            'country' => $request->get('country')
        ]);
        return response()->json(['success'=> true, 'message' => 'Данные успешно изменены.', 'class' => 'alert-message success']);
    }

    public function changeTag(Request $request) {
        $balance = AccountDonate::where('id', auth()->user()->accountWotlk->id)->first();

        if ($balance->bonuses >= setting('platnye-uslugi.NightHoldTag')) {
            $user = User::where('email', auth()->user()->email)->first();

            $user->update([
                'name' => $request->get('name')
            ]);

            $newBalance = $balance->bonuses - setting('platnye-uslugi.NightHoldTag');

            AccountDonate::where('id', auth()->user()->accountWotlk->id)->update([
                'bonuses' => $newBalance
            ]);

            return response()->json(['successtag'=> true, 'message' => 'Данные успешно изменены.', 'class' => 'alert-message success']);
        }  else {
            return response()->json(['successtag'=> false, 'message' => 'У вас недостаточное бонусов', 'class' => 'alert-message error']);
        }
    }

    public function changeEmail(Request $request) {
        if(Hash::check($request->get('password'), auth()->user()->password)) {
            $user = User::where('email', auth()->user()->email)->first();
            Account::newEmailBnet($request->get('email'));
            Account::newPasswordChangeEmail($request->get('email'), $request->get('password'));
            $user->update([
                'email' => $request->email
            ]);
            return response()->json(['success'=> true, 'message' => 'Электронная почта успешно изменена.', 'class' => 'alert-message success']);
        } else {
            return response()->json(['success'=> false, 'message' => 'Login Fail, pls check password', 'class' => 'alert-message error']);
        }
    }

    public function user() {
        $data = auth()->user();
        $data['questions'] = __('account.question_'.$data['question']);
        $data['countrys'] = __('country.'.$data['country']);
        if (auth()->user()->accountWotlk) {
            $user = auth()->user()->accountWotlk->id;
            $balance = AccountDonate::where('id', $user)->first();
        }
        return json_encode([
            'data' => $data,
            'balance' => $balance->bonuses ?? 0,
            'votes' => $balance->votes ?? 0,
            'NightHoldTag' => setting('platnye-uslugi.NightHoldTag'),
        ], JSON_UNESCAPED_UNICODE|JSON_INVALID_UTF8_IGNORE);
    }

    public function select(Request $request) {
        $request->session()->put('characters', $request->get('name'));
        $request->session()->save();
        $data = ['successful' => 'Персонаж успешно выбран.'];
        return response()->json($data);
    }

    public function characters() {
        $data = auth()->user()->characters;
        $characters = [];
        foreach ($data as $item ) {
            $characters[] =
                [
                    "name" => $item->name,
                    "level" => $item->level,
                    "race" => Utils::imageRace($item->race),
                    "class" => Utils::imageClass($item->race, $item->gender),
                    "server" => $item->realmName,
                    "totaltime" => Text::totalTime($item->totaltime),
                    "logout_time" => Text::lastLoginCharacters($item->logout_time),
                    "selected_characters" => session('characters'),
                ];
        }
        return json_encode($characters, JSON_UNESCAPED_UNICODE|JSON_INVALID_UTF8_IGNORE);
    }

    public function payment() {
        $data = HistoryPayment::where('user_id', auth()->user()->id)
            ->where('service', 'balance')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        $count = HistoryPayment::where('user_id', auth()->user()->id)->where('service', 'balance')->get()->count();
        return response()->json(['error' => false, 'data' => $data, 'count' => $count]);
    }

    /**
     * @throws \JsonException
     */
    public function game()
    {
        $userSL = auth()->user()->account;
        $userWotlk = auth()->user()->accountWotlk;
        return response()->json([
            'error' => false,
            'dataSL' => Text::convertDateLastLogin($userSL->last_login),
            'dataWotlk' => Text::convertDateLastLogin($userWotlk->last_login),
            'loginSl' => $userWotlk->email,
            'loginWotlk' => $userWotlk->username
        ]);
    }

    public function banned()
    {
        $notBanned = 0;
        $banned = 1;
        $userSL = auth()->user()->account->banned;
        $userWotlk = auth()->user()->accountWotlk->banned;
        if($userSL === NULL || $userWotlk === NULL) {
            return response()->json(['error' => false, 'data' => $notBanned]);
        } elseif($userSL->active === 0 || $userWotlk->active === 0) {
            return response()->json(['error' => false, 'data' => $notBanned]);
        } else {
            return response()->json(['error' => false, 'data' => $banned]);
        }

    }

    public function referrals()
    {
        $data = Referral::where('ref_id', Auth::user()->id)->with('referrer')->with('characters')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $referrals = [];
        foreach ($data as $item ) {
            $referrals[] =
                [
                    "name" => $item->referrer->name ?? 'Не известно',
                    "bonus" => $item->bonus ?? 'Не известно',
                    "totaltime" => Text::totalTime($item->characters->totaltime ?? '0')
                ];
        }

        return response()->json([
            'error' => false,
            'data' =>  $referrals,
            'count' =>  $data->count(),
            'url' => config('app.url') . "?ref=" . \Hashids::encode(auth()->user()->id)
        ]);
    }
}
