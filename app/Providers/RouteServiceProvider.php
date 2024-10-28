<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
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
    public const HOME = '/dashboard';
    public const ADMIN_HOME = '/admin/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
            /*----- custom routes register Website route management ----- */
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            /*----- custom routes register for only admin dashboard varification manage ----- */
            Route::middleware('web')
            ->group(base_path('routes/admin_verification.php'));
            /*----- custom routes register for only user or staff dashboard varification manage ----- */
            Route::middleware('web')
            ->group(base_path('routes/user_verification.php'));

            /*----- custom routes register manage application for header & footer----- */
            Route::middleware('web')
            ->group(base_path('routes/manageapplication.php'));
            /*----- custom routes register for frontend manage ----- */
            Route::middleware('web')
            ->group(base_path('routes/webbackend.php'));
            /*----- custom routes register for staff access controllor manage ----- */
            Route::middleware('web')
            ->group(base_path('routes/staffroute.php'));
            /*----- custom routes register for customer access controllor manage ----- */
            Route::middleware('web')
            ->group(base_path('routes/customerroute.php'));
            /*----- custom routes register for staff  manage ----- */
            Route::middleware('web')
            ->group(base_path('routes/staffmanage.php'));
            /*----- custom routes register for customer manage ----- */
            Route::middleware('web')
            ->group(base_path('routes/customermanage.php'));
            /*----- custom routes register for customer manage ----- */
            Route::middleware('web')
            ->group(base_path('routes/normaluserroute.php'));
            /*----- custom routes register for customer manage ----- */
            Route::middleware('web')
            ->group(base_path('routes/volunteerroute.php'));
        });
    }
}
