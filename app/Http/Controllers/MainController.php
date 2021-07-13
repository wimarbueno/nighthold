<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\User;
use App\Models\Web\Referral;
use App\Models\Wotlk\Account\AccountDonate;
use App\Models\Wotlk\Account\AccountPremium;
use App\Services\Account;
use App\Services\Posts\Posts;
use App\Services\Referrals;
use App\Services\Soap\SoapWotlk;
use Butschster\Head\Facades\Meta;
use Carbon\Carbon;
use TCG\Voyager\Models\Post;

class MainController extends Controller
{

    function __construct() {
        if (Auth()->check()){
            Account::init();
            Referrals::init();
        }
    }

    public function index () {
        $data = (new Posts)->getHome();
        $content = Homepage::orderBy('sort', 'ASC')->get();
        Meta::prependTitle(setting('site.title'))
            ->setDescription('Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!');
        return view('dashboard', ['data' => $data, 'content' => $content]);
    }

    public function update () {
        $data = Post::where('category_id', 1)->orderBy('created_at', 'DESC')->simplePaginate();
        Meta::prependTitle('Описание обновления')
            ->setDescription('Прочитайте о самых свежих новинках и исправлениях для World of Warcraft.');
        return view('update', ['update' => $data]);
    }

    /**
     * @throws \Exception
     */
    public function referral()
    {
        ////\App\Models\Shadowlands\Account\Account::newPasswordBnetSrp6('koltkot1703@gmail.com', '415827');

        //$soap = new SoapWotlk();
        //if($soap->cmd('.send items Thanos "Поводья Непобедимого" "Thank you for purchasing" 50818[:1]') === NULL) {
         //   $data = ['success' => 'Ошибка', 'data' => 'Успешно, товар оправлен вам на внутреигровую почту!'];
       // } else {
        //    $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
        //}

        $referred = Referral::where('ref_id', 17)->get();

        if(count($referred) === 0) {
            $bonus = 10;
            $refer = User::where('id', 17)->first();
            AccountDonate::updateOrCreate([
                'id' => $refer->accountWotlk->id,
            ],[
                'bonuses' => $bonus,
                'votes' => 0,
                'total_votes' => 1,
                'total_bonuses' => 1
            ]);
        } else {
            $bonus = 5;
            $refer = User::where('id', 17)->first();
            AccountDonate::updateOrCreate([
                'id' => $refer->accountWotlk->id,
                ],[
                'bonuses' => $bonus,
                'votes' => 0,
                'total_votes' => 1,
                'total_bonuses' => 1
            ]);
        }

        $referrals =  Referral::where('ref_id', 17)->get();

        if (count($referrals) === 10) {
            $refer = User::where('id', 17)->first();
            AccountPremium::updateOrCreate([
                'id' => $refer->accountWotlk->id,
            ], [
                'setdate' => Carbon::now()->addDays(0)->timestamp,
                'unsetdate' => Carbon::now()->addDays(30)->timestamp,
                'active' => 1
            ]);
        }
        return config('app.url') . "?ref=" . \Hashids::encode(auth()->user()->id);

    }

    public function promoPage () {
        Meta::prependTitle('Shadowlands — Главная страница')
            ->setDescription('Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!');
        return view('promoPage');
    }
}
