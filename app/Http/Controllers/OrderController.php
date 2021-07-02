<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = $request->month;
        $year = $request->year;

        $orders = Order::latest($month, $year)->get();

        $totalMonthUS = Order::totalMonthUS($month, $year);
        $totalMonthCLI = Order::totalMonthCLI($month, $year);
        $totalMonthCount = Order::totalMonthCount($month, $year);

        return view(
            'order.index',
            compact(
                'orders',
                'totalMonthCLI',
                'totalMonthUS',
                'totalMonthCount'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shopping_cart = ShoppingCart::findOrCreateBySessionID(
            $request->session()->get('shopping_cart_id')
        );

        $fecha_reserva = $request->fecha_reserva;

        Order::createFromReserva($shopping_cart, $fecha_reserva);

        return Redirect::to('/compras/' . $shopping_cart->customid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "store Order";

        // return Redirect::to('warehouse/product')->with('info', 'Orden guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $products = $order->shopping->products;

        return view('order.show', compact('order', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::find($id);

        $field = $request->name;

        $order->$field = $request->value;
        $order->save();

        if ($request->ajax()) {
            return response()->json([]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->destroyOrder($order);

        return Redirect::to('orders');
    }

    public function orderDay()
    {
        $orders = Order::latestDay()->get();

        return view('order.order_day', compact('orders'));
    }
}
