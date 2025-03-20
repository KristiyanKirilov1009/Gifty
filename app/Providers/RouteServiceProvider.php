<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = 'admin/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function (Request $request) {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));


            $locale = $request->segment(1);
            if (! in_array($locale, Config::get('languages'))) {
                $locale = Config::get('app.locale');
            }

            if ($locale != App::getLocale()) {
                App::setLocale($locale);
            }

            if (App::getLocale() != Config::get('app.fallback_locale')) {
                Route::middleware('web')
                    ->prefix(App::getLocale())
                    ->group(base_path('routes/web.php'));
            } else {
                Route::middleware('web')
                    ->group(base_path('routes/web.php'));
            }


            // Route::middleware('web')
            //     ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));
        });
    }
}
