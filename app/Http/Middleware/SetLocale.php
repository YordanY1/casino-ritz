<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if ($locale = $request->get('lang')) {
            session(['locale' => $locale]);
        }

        App::setLocale(session('locale', config('app.locale')));

        return $next($request);
    }
}
