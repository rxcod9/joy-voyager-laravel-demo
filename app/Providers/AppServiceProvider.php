<?php

namespace App\Providers;

use App\Http\Middleware\VoyagerAdminMiddleware;
use App\Models\User;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Router $router, Dispatcher $event)
    {
        \URL::forceRootUrl(\Config::get('app.url'));
        // And this if you wanna handle https URL scheme
        // It's not usefull for http://www.example.com, it's just to make it more independant from the constant value
        if (\Str::contains(\Config::get('app.url'), 'https://')) {
            \URL::forceScheme('https');
            //use \URL:forceSchema('https') if you use laravel < 5.4
        }
        // Override User model
        Voyager::useModel('User', User::class);

        $router->aliasMiddleware('admin.user', VoyagerAdminMiddleware::class);
    }
}
