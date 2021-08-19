<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\User;
use App\Models\Web\ForumsXF;
use App\Models\Wotlk\Account\AccountWotlk;
use App\Services\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServicesController extends Controller
{

    var $portable_hashes;
    var $random_state;

    public function createWotlk(Request $request) {

        $data = $request->only([
            'name', 'password'
        ]);

        if(Hash::check($data['password'], auth()->user()->password)) {

            $hashed_pass = strtoupper(sha1(strtoupper($data['name'] . ':' . $data['password'])));

            AccountWotlk::create([
                'username' => $data['name'],
                'sha_pass_hash' => $hashed_pass,
                'email' => auth()->user()->email,
                'reg_mail' => auth()->user()->email,
                'expansion' => '2'
            ]);

            return response()->json([
                    'success'=> true,
                    'message' => 'Игровой аккаунт успешно прикреплен.',
                    'class' => 'alert-message success']
            );
        } else {
            return response()->json(['success'=> false, 'message' => 'Старый пароль неверный!', 'class' => 'alert-message error']);
        }
    }


    public function forum(Request $request) {

        $data = $request->only([
            'name', 'email', 'password'
        ]);

        if(Hash::check($data['password'], auth()->user()->password)) {

            $dir = '/var/www/www-root/data/www/nighthold/community.nighthold.pro';

            require($dir.'/src/XF.php');

            \XF::start($dir);
            $app = \XF::app();

            $user = $app->repository('XF:User')->setupBaseUser();

            $user->username = $data['name'];
            $user->email = $data['email'];
            $user->Auth->setPassword($data['password']);
            $user->save();

            return response()->json([
                    'success'=> true,
                    'message' => 'Данные успешно сохранены.',
                    'class' => 'alert-message success']
            );
        } else {
            return response()->json(['success'=> false, 'message' => 'Старый пароль неверный!', 'class' => 'alert-message error']);
        }
    }

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
