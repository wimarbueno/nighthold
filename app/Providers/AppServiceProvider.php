<?php

namespace App\Providers;

use App\Models\Channel;
use App\Models\Language;
use App\Services\Logs\Log;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(array_key_exists(request()->segment(1), config('app.locales'))) {
            app()->setLocale(request()->segment(1));
        }

        Log::Initialize(true, 2);

        view()->composer('layouts.providers.pages', function($view) {
            $view->with('pages', Page::where('status', 'ACTIVE')->get());
        });

        view()->composer('layouts.providers.mobileMenu', function($view) {
            $view->with('menu', Channel::where('parent_id', 0)->with('forums')->orderBy('sort')->get());
        });
    }
}
