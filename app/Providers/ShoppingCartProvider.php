<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ShoppingCart;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){

        $shopping_cart_id = \Session::get('shopping_cart_id');

        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

        \Session::put('shopping_cart_id', $shopping_cart->id);

        $view->with('shoppingCount', $shopping_cart->productsSize()); 
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
