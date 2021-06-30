<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class LocaleMiddleware
{
    public static $languages = ['de-de', 'en-gb', 'es-es', 'fr-fr', 'it-it', 'ru-ru', 'ja-jp', 'zh-cn', 'pt-pt'];

    public function handle($request, Closure $next) {
        $locale = self::getLocales();

        if($locale)
            App::setLocale($locale);
        setcookie('locale', $locale, strtotime('NEXT YEAR'), '/');
        return $next($request);
    }

    public static function getLocales() {
        $uri = (new \Illuminate\Http\Request)->path();

        $segmentsURI = explode('/',$uri);

        if (!empty($segmentsURI) && in_array($segmentsURI[0], self::$languages)) {
            return $segmentsURI[0];
        } else {
            return $_COOKIE['locale'] ?? config('app.locale');
        }
    }

}
