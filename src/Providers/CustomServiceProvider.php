<?php

namespace BLuelupin\Custom\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Pagination\Paginator;
use Webkul\Shop\Http\Middleware\Locale;
use Webkul\Shop\Http\Middleware\Theme;
use Webkul\Shop\Http\Middleware\Currency;
use Webkul\Core\Tree;

/**
 * Custom service provider
 *
 */
class CustomServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'custom');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/bluelupin/custom'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'custom');

        $router->aliasMiddleware('locale', Locale::class);
        $router->aliasMiddleware('theme', Theme::class);
        $router->aliasMiddleware('currency', Currency::class);

        $this->composeView();

        Paginator::defaultView('shop::partials.pagination');
        Paginator::defaultSimpleView('shop::partials.pagination');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Bind the the data to the views
     *
     * @return void
     */
    protected function composeView()
    {
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        // $this->mergeConfigFrom(
        //     dirname(__DIR__) . '/Config/menu.php', 'menu.customer'
        // );
    }
}