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
        $router = $this->app['router'];
        $this->publishes([
            __DIR__.'/config/auth.php' => config_path('auth.php'),
        ]);
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'LaravelAuth');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $router->middleware('auth', \Csteamengine\LaravelAuth\Middleware\Authenticate::class);
        $router->middleware('password_expires', \Csteamengine\LaravelAuth\Middleware\PasswordExpires::class);
        $router->middleware('guest', \Csteamengine\LaravelAuth\Middleware\RedirectIfAuthenticated::class);

        $router->middleware('auth.basic', \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class);
        $router->middleware('bindings', \Illuminate\Routing\Middleware\SubstituteBindings::class);
        $router->middleware('cache.headers', \Illuminate\Http\Middleware\SetCacheHeaders::class);
        $router->middleware('can', \Illuminate\Auth\Middleware\Authorize::class);
        $router->middleware('permission', \Spatie\Permission\Middlewares\PermissionMiddleware::class);
        $router->middleware('role', \Spatie\Permission\Middlewares\RoleMiddleware::class);
        $router->middleware('signed', \Illuminate\Routing\Middleware\ValidateSignature::class);
        $router->middleware('throttle', \Illuminate\Routing\Middleware\ThrottleRequests::class);
        $router->middleware('verified', \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class);


        $router->pushMiddlewareToGroup('web', \Csteamengine\LaravelAuth\Middleware\EncryptCookies::class);
        $router->pushMiddlewareToGroup('web', \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class);
        $router->pushMiddlewareToGroup('web', \Illuminate\Session\Middleware\StartSession::class);
        $router->pushMiddlewareToGroup('web', \Illuminate\Session\Middleware\AuthenticateSession::class);
        $router->pushMiddlewareToGroup('web', \Illuminate\View\Middleware\ShareErrorsFromSession::class);
        $router->pushMiddlewareToGroup('web', \Csteamengine\LaravelAuth\Middleware\VerifyCsrfToken::class);
        $router->pushMiddlewareToGroup('web', \Illuminate\Routing\Middleware\SubstituteBindings::class);
        $router->pushMiddlewareToGroup('web', \Csteamengine\LaravelAuth\Middleware\LocaleMiddleware::class);

    }
}
///**
// * The application's global HTTP middleware stack.
// *
// * These middleware are run during every request to your application.
// *
// * @var array
// */
//protected $middleware = [
//    \Csteamengine\LaravelAuth\Middleware\CheckForMaintenanceMode::class,
//    \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
//    \Csteamengine\LaravelAuth\Middleware\TrimStrings::class,
//    \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
//    \Csteamengine\LaravelAuth\Middleware\TrustProxies::class,
//];
//
///**
// * The application's route middleware groups.
// *
// * @var array
// */
//protected $middlewareGroups = [
//    'web' => [
//        \Csteamengine\LaravelAuth\Middleware\EncryptCookies::class,
//        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
//        \Illuminate\Session\Middleware\StartSession::class,
//        // \Illuminate\Session\Middleware\AuthenticateSession::class,
//        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
//        \Csteamengine\LaravelAuth\Middleware\VerifyCsrfToken::class,
//        \Illuminate\Routing\Middleware\SubstituteBindings::class,
//        \Csteamengine\LaravelAuth\Middleware\LocaleMiddleware::class,
//    ],
//
//    'api' => [
//        'throttle:60,1',
//        'bindings',
//    ],
//
//    'admin' => [
//        'auth',
//        'password_expires',
//        'permission:view backend',
//    ],
//];
//
///**
// * The application's route middleware.
// *
// * These middleware may be assigned to groups or used individually.
// *
// * @var array
// */
//protected $routeMiddleware = [
//    'auth' => \Csteamengine\LaravelAuth\Middleware\Authenticate::class,
//    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
//    'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
//    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
//    'can' => \Illuminate\Auth\Middleware\Authorize::class,
//    'guest' => \Csteamengine\LaravelAuth\Middleware\RedirectIfAuthenticated::class,
//    'password_expires' => \Csteamengine\LaravelAuth\Middleware\PasswordExpires::class,
//    'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
//    'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
//    'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
//    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
//    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
//];
//
///**
// * The priority-sorted list of middleware.
// *
// * This forces non-global middleware to always be in the given order.
// *
// * @var array
// */
//protected $middlewarePriority = [
//    \Illuminate\Session\Middleware\StartSession::class,
//    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
//    \Csteamengine\LaravelAuth\Middleware\Authenticate::class,
//    \Illuminate\Session\Middleware\AuthenticateSession::class,
//    \Illuminate\Routing\Middleware\SubstituteBindings::class,
//    \Illuminate\Auth\Middleware\Authorize::class,
//];