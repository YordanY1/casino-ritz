<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->route('lang');

        if (in_array($lang, ['bg', 'en', 'tr', 'el'])) {
            app()->setLocale($lang);
        } else {
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
