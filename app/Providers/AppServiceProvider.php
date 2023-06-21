<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // <li @routeactive('main')>
        Blade::directive('routeactive', function ($route){
            return "<?php echo Route::currentRouteNamed($route) ? 'class=\"menu_active\"' : '' ?>";
        });

        Blade::if('admin', function(){
            return Auth::check() && Auth::user()->isAdmin();
        });

        // регистрация обсервера для товаров
        Product::observe(ProductObserver::class);

    }
}
