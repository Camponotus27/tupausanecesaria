<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use App\Order;
use Illuminate\Http\Request;
use App\PayPal;

class ShoppingCartController extends Controller
{
    public function __construct(){
        $this->middleware('shoppingcart');
    }

    public function index(Request $request)
    {

        $shopping_cart = $request->shopping_cart;

        $products = $shopping_cart->products()->get();

        $total = $shopping_cart->total();

        return view('shopping_carts.index' , compact('products','total'));


    }

    
    public function show(ShoppingCart $shoppingCart, $id)
    {
        $shopping_cart = ShoppingCart::where('customid', $id)->first();
        $products = $shopping_cart->products()->get();
        $total = $shopping_cart->total();
        $order = $shopping_cart->order();

        return view('shopping_carts.completed' , compact('shopping_cart' , 'order' , 'products' , 'total'));
    }

   public function checkout(Request $request){

        $shopping_cart = $request->shopping_cart;
        $shopping_cart->actualizarFechaReserva($request->fecha_reserva);

        $paypal = new Paypal($shopping_cart);
        $payment = $paypal->generate();

        return redirect($payment->getApprovalLink()); 
   }


   public function misCompras(){

        $orders = Order::findAllByIdUser();
        $shopping_carts = Order::ordersToShopingCarts($orders);

        return view('shopping_carts.mis_compras' , compact('shopping_carts' , 'orders'));
   }
}
