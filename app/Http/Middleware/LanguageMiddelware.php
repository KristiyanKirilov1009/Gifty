<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class LanguageMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Make sure current locale exists.
        $locale = $request->segment(1);

        if (!in_array($locale, Config::get('languages'))) {
            $locale = Config::get('app.locale');
        }

        if ($locale != App::getLocale()) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
