<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\User;
use App\Models\Web\ForumsXF;
use App\Services\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServicesController extends Controller
{

    var $portable_hashes;
    var $random_state;

    public function forum(Request $request) {

        $data = $request->only([
            'name', 'email', 'password'
        ]);

        if(Hash::check($data['password'], auth()->user()->password)) {

            $dir = '/var/www/www-root/data/www/community.nighthold.pro/';

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

    private function HashPassword($password)
    {
        $random = '';

        if (CRYPT_BLOWFISH == 1 && !$this->portable_hashes) {
            $random = $this->get_random_bytes(16);
            $hash = crypt($password, $this->gensalt_blowfish($random));
            if (strlen($hash) == 60)
                return $hash;
        }

        if (CRYPT_EXT_DES == 1 && !$this->portable_hashes) {
            if (strlen($random) < 3)
                $random = $this->get_random_bytes(3);
            $hash = crypt($password, $this->gensalt_extended($random));
            if (strlen($hash) == 20)
                return $hash;
        }

        if (strlen($random) < 6)
            $random = $this->get_random_bytes(6);
        $hash =
            $this->crypt_private($password,
                $this->gensalt_private($random));
        if (strlen($hash) == 34)
            return $hash;

        # Returning '*' on error is safe here, but would _not_ be safe
        # in a crypt(3)-like function used _both_ for generating new
        # hashes and for validating passwords against existing hashes.
        return '*';
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
