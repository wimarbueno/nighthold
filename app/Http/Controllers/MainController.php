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
            ///Account::init();
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

    public function promoPage () {
        Meta::prependTitle('Shadowlands — Главная страница')
            ->setDescription('Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!');
        return view('promoPage');
    }
}
