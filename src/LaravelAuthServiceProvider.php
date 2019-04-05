<?php

namespace Csteamengine\LaravelAuth;

use Illuminate\Support\ServiceProvider;

class LaravelAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
//        $router = $this->app['router'];
        $this->publishes([
            __DIR__.'/config/auth.php' => config_path('auth.php'),
        ]);
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'LaravelAuth');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

//        $router->middleware('auth', \Csteamengine\LaravelAuth\Middleware\Authenticate::class);
//        $router->middleware('password_expires', \Csteamengine\LaravelAuth\Middleware\PasswordExpires::class);
//        $router->middleware('guest', \Csteamengine\LaravelAuth\Middleware\RedirectIfAuthenticated::class);
//
//        $router->middleware('auth.basic', \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class);
//        $router->middleware('bindings', \Illuminate\Routing\Middleware\SubstituteBindings::class);
//        $router->middleware('cache.headers', \Illuminate\Http\Middleware\SetCacheHeaders::class);
//        $router->middleware('can', \Illuminate\Auth\Middleware\Authorize::class);
//        $router->middleware('permission', \Spatie\Permission\Middlewares\PermissionMiddleware::class);
//        $router->middleware('role', \Spatie\Permission\Middlewares\RoleMiddleware::class);
//        $router->middleware('signed', \Illuminate\Routing\Middleware\ValidateSignature::class);
//        $router->middleware('throttle', \Illuminate\Routing\Middleware\ThrottleRequests::class);
//        $router->middleware('verified', \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class);
//
//
//        $router->pushMiddlewareToGroup('web', \Csteamengine\LaravelAuth\Middleware\EncryptCookies::class);
//        $router->pushMiddlewareToGroup('web', \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class);
//        $router->pushMiddlewareToGroup('web', \Illuminate\Session\Middleware\StartSession::class);
//        $router->pushMiddlewareToGroup('web', \Illuminate\Session\Middleware\AuthenticateSession::class);
//        $router->pushMiddlewareToGroup('web', \Illuminate\View\Middleware\ShareErrorsFromSession::class);
//        $router->pushMiddlewareToGroup('web', \Csteamengine\LaravelAuth\Middleware\VerifyCsrfToken::class);
//        $router->pushMiddlewareToGroup('web', \Illuminate\Routing\Middleware\SubstituteBindings::class);
//        $router->pushMiddlewareToGroup('web', \Csteamengine\LaravelAuth\Middleware\LocaleMiddleware::class);

    }
}