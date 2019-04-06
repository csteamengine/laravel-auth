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
            __DIR__.'/public/mix-manifest.json' => 'public/laravel-auth/mix-manifest.json',
            __DIR__.'/public/css/' => 'public/laravel-auth/css/',
            __DIR__.'/public/js/' => 'public/laravel-auth/js/'
        ]);
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'LaravelAuth');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'LaravelAuth');

        $router->pushMiddlewareToGroup('guest', \Csteamengine\LaravelAuth\Middleware\EncryptCookies::class);
        $router->pushMiddlewareToGroup('guest', \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class);
        $router->pushMiddlewareToGroup('guest', \Illuminate\Session\Middleware\StartSession::class);
        $router->pushMiddlewareToGroup('guest', \Illuminate\Session\Middleware\AuthenticateSession::class);
        $router->pushMiddlewareToGroup('guest', \Illuminate\View\Middleware\ShareErrorsFromSession::class);
        $router->pushMiddlewareToGroup('guest', \Csteamengine\LaravelAuth\Middleware\VerifyCsrfToken::class);
        $router->pushMiddlewareToGroup('guest', \Illuminate\Routing\Middleware\SubstituteBindings::class);
        $router->pushMiddlewareToGroup('guest', \Csteamengine\LaravelAuth\Middleware\LocaleMiddleware::class);

    }
}