<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!array_key_exists($request->segment(1), config('app.locales'))) {
            $segments = $request->segments();

            $segments = \Arr::prepend($segments, config('app.fallback_locale'));

            if($request->session()->has('language')) {
                $segments[0] = session('language');
            }

            return redirect()->to(implode('/', $segments));
        }

        return $next($request);
    }
}
