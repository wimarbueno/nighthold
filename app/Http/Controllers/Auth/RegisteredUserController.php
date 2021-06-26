<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Shadowlands\Account\Account;
use App\Models\User;
use App\Models\Wotlk\Account\AccountWotlk;
use App\Services\Soap\Soap;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    public function started(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'country' => 'required|string',
            'dob-day' => 'required|string|min:2|',
            'dob-month' => 'required|string|min:2',
            'dob-year' => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return view('auth.register.step_1')
                ->withErrors($validator);
        }

        Session::put('user_info', $request->only(['country', 'dob-plain', 'dob-format', 'dob-day', 'dob-month', 'dob-year']));
        return view('auth.started');
    }

    public function provide(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first-name' => 'required|string|min:2|max:20',
            'last-name' => 'required|string|min:2|max:20'
        ]);

        if ($validator->fails()) {
            return view('auth.register.step_2')
                ->withErrors($validator);
        }
        Session::put('user_name', $request->only(['first-name', 'last-name']));
        return view('auth.provide');
    }

    public function credentials(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users|ends_with:gmail.com,mail.ru,inbox.ru,list.ru,yandex.ru,bk.ru,yahoo.com,outlook.com,rambler.ru,icloud.com'
        ]);

        if ($validator->fails()) {
            return view('auth.register.step_3')
                ->withErrors($validator);
        }
        Session::put('user_credentials', $request->only(['email', 'phoneNumber']));
        return view('auth.credentials');
    }

    public function legal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tou-agreements' => 'accepted'
        ]);

        if ($validator->fails()) {
            return view('auth.register.step_4')
                ->withErrors($validator);
        }
        Session::put('user_legal', $request->only(['special-offers', 'tou-agreements']));
        return view('auth.legal');
    }

    public function setPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return view('auth.register.step_5')
                ->withErrors($validator);
        }
        Session::put('user_password', $request->only(['password']));
        return view('auth.setPassword');
    }

    /**
     * @throws \Exception
     */
    public function battletag(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'battletag' => 'required|string'
        ]);

        if ($request->input('battletag') === $request->input('wotlk')) {
            return view('auth.register.step_6')
                ->withErrors(['wotlk' => __('account.create_step_0_1')]);
        }

        if ($validator->fails()) {
            return view('auth.register.step_6')
                ->withErrors($validator);
        }

        $cookie = Cookie::get('referral');

        $referred_by = $cookie ? \Hashids::decode($cookie)[0] : null;

        Auth::login($user = User::create([
            'name' => $request->input('battletag'),
            'lastName' => Session::get('user_name.first-name'),
            'firstName' => Session::get('user_name.last-name'),
            'dobDay' => Session::get('user_info.dob-day'),
            'dobMonth' => Session::get('user_info.dob-month'),
            'dobYear' => Session::get('user_info.dob-year'),
            'dobPlain' => Session::get('user_info.dob-plain'),
            'country' => Session::get('user_info.country'),
            'phoneNumber' => Session::get('user_credentials.phoneNumber'),
            'email' => Session::get('user_credentials.email'),
            'password' => Hash::make(Session::get('user_password.password')),
            'referred_by' => $referred_by
        ]));

        $email = Session::get('user_credentials.email');

        if(setting('soap.soap_enable') === "PUBLISHED") {
            if((new Soap)->cmd('.server info ') === NULL) {
                (new Soap)->cmd('.bnetaccount create ' . $email . ' ' . Session::get('user_password.password'));
                $hashed_pass = strtoupper(sha1(strtoupper($request->input('wotlk') . ':' . Session::get('user_password.password'))));
                AccountWotlk::create([
                 'username' => $request->input('wotlk'),
                 'sha_pass_hash' => $hashed_pass,
                 'email' => $email,
                 'reg_mail' => $email,
                 'expansion' => '2'
                ]);
            } else {
                Account::createSrp6BattleNet($email, Session::get('user_password.password'));
                $hashed_pass = strtoupper(sha1(strtoupper($request->input('wotlk') . ':' . Session::get('user_password.password'))));
                AccountWotlk::create([
                    'username' => $request->input('wotlk'),
                    'sha_pass_hash' => $hashed_pass,
                    'email' => $email,
                    'reg_mail' => $email,
                    'expansion' => '2'
                ]);
            }
        }
        elseif(setting('registraciya.srp6_support') === "PUBLISHED") {
            Account::createBattleNet(Session::get('user_credentials.email'), Session::get('user_password.password'));
            $hashed_pass = strtoupper(sha1(strtoupper($request->input('wotlk') . ':' . Session::get('user_password.password'))));
            AccountWotlk::create([
                'username' => $request->input('wotlk'),
                'sha_pass_hash' => $hashed_pass,
                'email' => $email,
                'reg_mail' => $email,
                'expansion' => '2'
            ]);
        }else {
            Account::createSrp6BattleNet($email, Session::get('user_password.password'));
            $hashed_pass = strtoupper(sha1(strtoupper($request->input('wotlk') . ':' . Session::get('user_password.password'))));
            AccountWotlk::create([
                'username' => $request->input('wotlk'),
                'sha_pass_hash' => $hashed_pass,
                'email' => $email,
                'reg_mail' => $email,
                'expansion' => '2'
            ]);
        }

        Session::forget('user_name');
        Session::forget('user_info');
        Session::forget('user_credentials');
        Session::forget('user_password');
        Session::forget('user_name_tag');

        event(new Registered($user));
        return view('auth.battletag', compact('email'));
    }

    public function suggestion()
    {
        $post = [
            'method' => 'getNickName',
            'count_result' => 1

        ];
        $ch = curl_init('https://rustxt.ru/api/index.php');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest",
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $resutl_syn = curl_exec($ch);
        curl_close($ch);
        $array = ["[","\\","?",".", "]", " ", "\""];
        return response()->json([
            "battleTag" => ucfirst(str_replace($array, "", $resutl_syn))
        ]);
    }
}
