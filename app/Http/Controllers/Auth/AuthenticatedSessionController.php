<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Web\ForumsXF;
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

        //$client = new Client(['base_uri' => config('app.forum_url'), 'timeout'  => 3.0]);
        //$userXF = ForumsXF::where('email', $request['email'])->first();
        //$client->request('POST', '/index.php?api/auth/login-token', [
        //    'headers' => [
        //        'XF-Api-Key' => config('app.forum_key'),
        //        'XF-Api-User' => config('app.forum_user'),
        //    ],
        //    'form_params' => [
        //        'user_id' => $userXF->user_id
        //    ]
        //]);

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
