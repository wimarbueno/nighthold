<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\HistoryPayment;
use App\Models\User;
use App\Services\Soap\Soap;
use App\Services\Text;
use App\Services\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function notifications() {
        return response()->json([]);
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
        $balance = Account::balance()->balans;
        return response()->json(['data' => $data, 'balance' => $balance]);
    }

    public function select(Request $request) {
        $request->session()->put('characters', $request->get('name'));
        $request->session()->save();
        $data = ['successful' => 'Персонаж успешно выбран.'];
        return response()->json($data);
    }

    public function characters() {
        $data = auth()->user()->account->charactersApi;
        $characters = [];
        foreach ($data as $item ) {
            $characters[] =
                [
                    "name" => $item->name,
                    "level" => $item->level,
                    "race" => asset(Utils::imageRace($item->race)),
                    "class" => asset(Utils::imageClass($item->race, $item->gender)),
                    "totaltime" => Text::totalTime($item->totaltime),
                    "logout_time" => Text::lastLoginCharacters($item->logout_time),
                    "selected_characters" => session('characters'),
                ];
        }
        return json_encode($characters, JSON_UNESCAPED_UNICODE);
    }

    public function payment() {
        $data = HistoryPayment::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return response()->json(['error' => false, 'data' => $data]);
    }

    public function game()
    {
        $user = Auth::user()->account;
        return response()->json(['error' => false, 'data' => $user]);
    }

    public function referrals()
    {
        return response()->json(['error' => false, 'data' =>  auth()->user()->referrals]);
    }

    public function banned()
    {
        $notBanned = 0;
        $banned = 1;
        $user = Auth::user()->account->banned;
        if($user === NULL) {
            return response()->json(['error' => false, 'data' => $notBanned]);
        } elseif($user->active === 0) {
            return response()->json(['error' => false, 'data' => $notBanned]);
        } else {
            return response()->json(['error' => false, 'data' => $banned]);
        }

    }
}
