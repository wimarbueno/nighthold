<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\User;
use App\Services\Utils;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function upload(Request $request) {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        ]);

        $imageName = time().'.'.$request->file->extension();

        $path = 'public/users/user-' . auth()->user()->id . '/';

        $request->file('file')->storeAs($path, $imageName);

        $user = User::where('id', auth()->user()->id)->first();
        $user->avatar = 'users/user-' . auth()->user()->id . '/' . $imageName;
        $user->save();
        return response()->json(['success' => true, 'data' => 'Аватар изменен']);
    }

    public function index() {
        return json_encode(Services::all(), JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request) {
        switch ($request->get('type')) {

            case 'summon':
                if($request->session()->has('characters')) {
                    Utils::teleport($request->session()->get('characters'));
                    $data = ['success' => 'Успешно', 'data' => 'Ваш персонаж был отправлен в Даларан!'];
                } else {
                    $data = ['error' => 'Ошибка', 'data' => 'Персонаж не выбран!'];
                }
                break;

            case 'unmute':
                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка обратитесь к администратору сайта.'];
                break;

            case 'unban':
                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта!'];
            break;

            default;
                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
            break;
        }

        return response()->json($data);
    }
}
