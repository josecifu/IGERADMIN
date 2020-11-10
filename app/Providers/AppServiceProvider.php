<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\models\menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer("Administration.Base._header", function ($view) {
            
            $menus = menu::getMenu(true);
            dd( $menus);
            $view->with('menus', $menus);
        });
        View::share('Base');
    }
}
