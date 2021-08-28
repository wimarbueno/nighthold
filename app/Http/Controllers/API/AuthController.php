<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryPayment;
use App\Models\Shadowlands\Account\Account;
use App\Models\Streams;
use App\Models\User;
use App\Models\Web\ForumsPassword;
use App\Models\Web\ForumsXF;
use App\Models\Web\Referral;
use App\Models\Wotlk\Account\AccountDonate;
use App\Models\Wotlk\Account\AccountWotlk;
use App\Services\Soap\Soap;
use App\Services\Soap\SoapWotlk;
use App\Services\Text;
use App\Services\Utils;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function streamSend(Request $request): \Illuminate\Http\JsonResponse
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
            'name_user' => 'required|string|min:2|strip_min:2|regex:/(^([_a-zA-Z0-9_]+)(\d+)?$)/u'
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

    public function changeQuestion(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', auth()->user()->email)->first();
        $user->update([
            'question' => $request->get('question'),
            'answer' => $request->get('answer')
        ]);
        return response()->json(['success'=> true, 'message' => 'Данные успешно изменены.', 'class' => 'alert-message success']);
    }

    public function changePassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $password = $request->only([
            'oldPassword', 'newPassword', 'confirmPassword'
        ]);

        if ($password['newPassword'] != $password['confirmPassword']) {
            return response()->json(['success'=> false, 'message' => 'Поле «подтвердить пароль» не совпадает.', 'class' => 'alert-message error']);
        }

        if(Hash::check($password['oldPassword'], auth()->user()->password)) {
            $user = User::where('email', auth()->user()->email)->first();

            if ($user->accountWotlk) {
                $soap = new SoapWotlk();
                $soap->cmd('.account set password ' . $user->accountWotlk->username . ' ' . $password['newPassword'] . ' ' . $password['newPassword']);
            }

            $user->update([
                'password' => Hash::make($password['newPassword'])
            ]);

            $userXF = ForumsXF::where('email', $user->email)->first();

            $client = new Client(['base_uri' => config('app.forum_url'), 'timeout'  => 2.0]);

            $client->request('POST', '/index.php?api/users/' . $userXF->user_id, [
                'headers' => [
                    'XF-Api-Key' => config('app.forum_key'),
                    'XF-Api-User' => config('app.forum_user'),
                ],
                'form_params' => [
                    'password' => $password['newPassword']
                ]
            ]);

            return response()->json([
                'success'=> true,
                'message' => 'Данные успешно изменены. Для входа на сайт и в игры используйте новый пароль.',
                'class' => 'alert-message success']
            );
        } else {
            return response()->json(['success'=> false, 'message' => 'Старый пароль неверный!', 'class' => 'alert-message error']);
        }
    }

    public function changeName(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', auth()->user()->email)->first();
        $user->update([
            'lastName' => $request->get('last-name'),
            'firstName' => $request->get('first-name'),
            'country' => $request->get('country')
        ]);
        return response()->json(['success'=> true, 'message' => 'Данные успешно изменены.', 'class' => 'alert-message success']);
    }

    public function changeTag(Request $request): \Illuminate\Http\JsonResponse
    {
        if (auth()->user()->free_name === 1) {
            $balance = AccountDonate::where('id', auth()->user()->accountWotlk->id)->first();
            if ($balance) {
                if ($balance->bonuses >= setting('platnye-uslugi.NightHoldTag')) {

                    $newBalance = $balance->bonuses - setting('platnye-uslugi.NightHoldTag');
                    AccountDonate::where('id', auth()->user()->accountWotlk->id)->update([
                        'bonuses' => $newBalance
                    ]);

                    $user = User::where('email', auth()->user()->email)->first();

                    $forumUser = ForumsXF::where('email', auth()->user()->email)->first();

                    $forumUser->update([
                        'username' => $request->get('name')
                    ]);

                    $user->update([
                        'name' => $request->get('name'),
                        'free_name' => 1
                    ]);
                    return response()->json(['successtag'=> true, 'message' => 'Данные успешно изменены.', 'class' => 'alert-message success']);
                }
                else {
                    return response()->json(['successtag'=> false, 'message' => 'У вас недостаточное бонусов', 'class' => 'alert-message error']);
                }
            }
        } else {
            $user = User::where('email', auth()->user()->email)->first();

            $forumUser = ForumsXF::where('email', auth()->user()->email)->first();

            $forumUser->update([
                'username' => $request->get('name')
            ]);

            $user->update([
                'name' => $request->get('name'),
                'free_name' => 1
            ]);
            return response()->json(['successtag'=> true, 'message' => 'Данные успешно изменены.', 'class' => 'alert-message success']);
        }

        return response()->json(['successtag'=> false, 'message' => 'У вас недостаточное бонусов', 'class' => 'alert-message error']);
    }

    public function changeEmail(Request $request): \Illuminate\Http\JsonResponse
    {
        if(Hash::check($request->get('password'), auth()->user()->password)) {
            $user = User::where('email', auth()->user()->email)->first();
            //Account::newEmailBnet($request->get('email'));
            //Account::newPasswordChangeEmail($request->get('email'), $request->get('password'));
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
            'forums' => ForumsXF::where('username', auth()->user()->name)->first()->username ?? ''
        ], JSON_UNESCAPED_UNICODE|JSON_INVALID_UTF8_IGNORE);
    }

    public function select(Request $request): \Illuminate\Http\JsonResponse
    {
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

    public function payment(): \Illuminate\Http\JsonResponse
    {
        $data = HistoryPayment::where('user_id', auth()->user()->id)
            ->where('service', 'balance')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        $count = HistoryPayment::where('user_id', auth()->user()->id)->where('service', 'balance')->get()->count();
        return response()->json(['error' => false, 'data' => $data, 'count' => $count]);
    }

    public function game(): \Illuminate\Http\JsonResponse
    {
        //$userSL = auth()->user()->account;
        $userWotlk = auth()->user()->accountWotlk;
        if ($userWotlk) {
            return response()->json([
                'error' => false,
                'dataSL' =>  'unknown',
                'dataWotlk' => Text::convertDateLastLogin($userWotlk->last_login) ?? 'unknown',
                'loginSl' => '',
                'loginWotlk' => $userWotlk->username
            ]);
        }
        return response()->json([
            'error' => false,
            'dataSL' => 'unknown',
            'dataWotlk' => 'unknown',
            'loginSl' => '',
            'loginWotlk' => ''
        ]);
    }

    public function banned(): \Illuminate\Http\JsonResponse
    {
        $notBanned = 0;
        $banned = 1;
        $userWotlk = auth()->user()->accountWotlk->banned;
        if($userWotlk) {
            if($userWotlk->active === 0) {
                return response()->json(['error' => false, 'data' => $notBanned]);
            } else {
                return response()->json(['error' => false, 'data' => $banned, 'banned_by' => $userWotlk->bannedby, 'reason' => $userWotlk->banreason]);
            }
        } else {
            return response()->json(['error' => false, 'data' => $notBanned]);
        }


    }

    public function referrals(): \Illuminate\Http\JsonResponse
    {
        $data = Referral::where('ref_id', Auth::user()->id)->with('referrer')->with('characters')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $count = Referral::where('ref_id', Auth::user()->id)->get()->count();
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
            'count' =>  $count,
            'url' => config('app.url') . "?ref=" . \Hashids::encode(auth()->user()->id)
        ]);
    }
}
