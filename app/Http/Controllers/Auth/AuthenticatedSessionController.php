<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $client = new Client(['base_uri' => config('app.forum_url'), 'timeout'  => 2.0]);

        $client->request('POST', '/index.php?api/auth/', [
            'headers' => [
                'XF-Api-Key' => 'Z6-Lw2VYGYXM8jf2Y1l_JtWvsrcVyYgn',
                'XF-Api-User' => '2',
            ],
            'form_params' => [
                'login' => $request['email'],
                'password' => $request['password']
            ]
        ]);
        
        return redirect(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
