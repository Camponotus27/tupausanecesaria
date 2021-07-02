<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BuildShoppingCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $shopping_cart_id = \Session::get('shopping_cart_id');
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);


        $request->shopping_cart = $shopping_cart;

        return $next($request);
    }
}
