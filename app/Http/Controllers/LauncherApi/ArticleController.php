<?php

namespace App\Http\Controllers\LauncherApi;

use App\Http\Controllers\Controller;

use Launcher;

class ArticleController extends Controller
{
	public function index()
	{
		return Launcher::getAllNews();
	}
}
