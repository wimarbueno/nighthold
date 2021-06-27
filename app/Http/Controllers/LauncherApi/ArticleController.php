<?php

namespace App\Http\Controllers\LauncherApi;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Launcher;

class ArticleController extends Controller
{
	public function show($lang)
	{
        App::setLocale($lang);
        setcookie('locale', $lang, strtotime('NEXT YEAR'), '/');
		return Launcher::getAllNews();
	}
}
