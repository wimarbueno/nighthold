<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Shadowlands\Account\Account;
use App\Models\Web\ForumsXF;
use App\Models\Wotlk\Account\AccountWotlk;
use App\Services\Soap\Soap;
use App\Services\Soap\SoapWotlk;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class NewPasswordController extends Controller
{

    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                if ($user->accountWotlk) {
                    $soap = new SoapWotlk();
                    $soap->cmd('.account set password ' . $user->accountWotlk->username . ' ' . $request->password . ' ' . $request->password);
                }

                $userXF = ForumsXF::where('email', $user->email)->first();

                $client = new Client(['base_uri' => config('app.forum_url'), 'timeout'  => 2.0]);

                $client->request('POST', '/index.php?api/users/' . $userXF->user_id, [
                    'headers' => [
                        'XF-Api-Key' => config('app.forum_key'),
                        'XF-Api-User' => config('app.forum_user'),
                    ],
                    'form_params' => [
                        'password' => $request->password
                    ]
                ]);

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
