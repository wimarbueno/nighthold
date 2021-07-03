<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryPayment;
use App\Models\Shadowlands\Account\Account;
use App\Models\Streams;
use App\Models\User;
use App\Models\Web\Referral;
use App\Models\Wotlk\Account\AccountDonate;
use App\Services\Soap\Soap;
use App\Services\Text;
use App\Services\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function streamSend(Request $request) {
        Streams::create([
            'name_user' => $request->get('name_user'),
            'id_user' => auth()->id()
        ]);
        return response()->json(['success'=> true, 'message' => 'Данные успешно отправлены.']);
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

    public function notifications() {
        return response()->json([]);
    }

    public function changeQuestion(Request $request) {
        $user = User::where('email', auth()->user()->email)->first();
        $user->update([
            'question' => $request->get('question'),
            'answer' => $request->get('answer')
        ]);
        return response()->json(['success'=> true, 'message' => 'Данные успешно изменены.']);
    }

    public function changePassword(Request $request) {
        $password = $request->only([
            'oldPassword', 'newPassword', 'confirmPassword'
        ]);

        if ($password['newPassword'] != $password['confirmPassword']) {
            return response()->json(['success'=> false, 'message' => 'Поле «подтвердить пароль» не совпадает.']);
        }

        if(Hash::check($password['oldPassword'], auth()->user()->password)) {
            $user = User::where('email', auth()->user()->email)->first();
            $soap = new Soap();
            if($soap->cmd('bnetaccount password '.$password['oldPassword'].' '.$password['newPassword'].' '.$password['confirmPassword']) === NULL) {
                $user->update([
                    'password' => Hash::make($password['newPassword'])
                ]);
                return response()->json(['success'=> true, 'message' => 'Пароль успешно изменен.']);
            } else {
                return response()->json(['success'=> true, 'message' => 'Не известная ошибка, обратитесь к администратору сайта.']);
            }
        } else {
            return response()->json(['success'=> false, 'message' => 'Старый пароль неверный!']);
        }
    }

    public function changeName(Request $request) {
        $user = User::where('email', auth()->user()->email)->first();
        $user->update([
            'lastName' => $request->get('last-name'),
            'firstName' => $request->get('first-name'),
            'country' => $request->get('country')
        ]);
        return response()->json(['success'=> true, 'message' => 'Данные успешно изменены.']);
    }

    public function changeEmail(Request $request) {
        if(Hash::check($request->get('password'), auth()->user()->password)) {
            $user = User::where('email', auth()->user()->email)->first();
            Account::newEmailBnet($request->get('email'));
            Account::newPasswordChangeEmail($request->get('email'), $request->get('password'));
            $user->update([
                'email' => $request->email
            ]);
            return response()->json(['success'=> true, 'message' => 'Электронная почта успешно изменена.']);
        } else {
            return response()->json(['success'=> false, 'message' => 'Login Fail, pls check password']);
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
            'balance' => $balance->bonuses ?? 0
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
                    "race" => asset(Utils::imageRace($item->race)),
                    "class" => asset(Utils::imageClass($item->race, $item->gender)),
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
        $count = HistoryPayment::where('user_id', auth()->user()->id)->get()->count();
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
        $this->referralData();

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

    private function referralData()
    {
        $data = Referral::where('ref_id', Auth::user()->id)->with('referrer')->with('characters')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
}
