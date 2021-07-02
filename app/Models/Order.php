<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ShoppingCart;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
		'recipient_name',
		'line1',
		'line2',
		'city',
		'country_code',
		'state',
		'postal_code',
		'email',
		'shopping_id',
		'user_id',
		'status',
		'total',
		'pagado',
		'guide_number'
	];

	//relaciones
	public function shopping()
    {
        return $this->belongsTo('App\ShoppingCart');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }


	//scope

	public function scopeLatest($query , $month , $year){
		return $query->orderID()->annual($year)->monthly($month);
	}

	public function scopeLatestDay($query){
		return $query->orderReserva()->notServed()->day();
	}

	public function scopeOrderID($query){
		return $query->orderBy('id','desc');
	}

	public function scopeOrderReserva($query){
		return $query->orderBy('shopping.fecha_reserva','asc');
	}

	public function scopeNotServed($query){
		return $query->where('orders.status' , '<>' , 'servido');
	}

	public function scopeDay($query){

			return $query->select('orders.id','orders.recipient_name','orders.created_at','orders.pagado','orders.status','orders.shopping_id' ,'orders.total','shopping.fecha_reserva')->join('shopping', 'orders.shopping_id' , 'shopping.id')->where('shopping.fecha_reserva' , 'LIKE' , date("Y-m-d")."%");
			//return $query->where('created_at' , 'LIKE' , date("Y-m-d")."%");
	}

	public function scopeMonthly($query , $month){
		if($month)
		{
			return $query->whereMonth('created_at' , $month);	
		}else{
			return $query->whereMonth('created_at' , date('m'));
		}
		
	}

	public function scopeAnnual($query , $year){
		if($year)
		{
			return $query->whereYear('created_at', $year);
		}else{
			return $query->whereYear('created_at', date('Y'));
		}
		
	}

	public function destroyOrder(){
		$this->delete();
	}
		

	// end scopes



	public function address(){
		return "$this->line1 $this->line2";
	}

	public function totalCLI(){
		return round($this->total * ShoppingCart::actualUS() , 0);
	}


	public static function totalMonthUS($month , $year){
		return Order::monthly($month)->annual($year)->sum('total');
	}

	public static function totalMonthCLI($month , $year){
		$unUS = ShoppingCart::actualUS();
		$OrderSuma = Order::monthly($month)->annual($year)->sum('total');

		 return round($unUS * $OrderSuma , 0);
	}

	public static function totalMonthCount($month , $year){
		return Order::monthly($month)->annual($year)->count();
	}


    public static function createFromPayPalResponse($response , $shopping_cart){
    	$payer = $response->payer;

    	$orderData = (array) $payer->payer_info->shipping_address;

    	$orderData = $orderData[key($orderData)];
    	$orderData['pagado'] = 1;
    	$orderData['email'] = $payer->payer_info->email; 
    	$orderData['total'] = $shopping_cart->totalUSD();
    	$orderData['shopping_id'] = $shopping_cart->id; 

    	return Order::create($orderData);
    }

    public static function createFromReserva($shopping_cart , $fecha_reserva = null , $pagado = 0){

    	\Session::remove('shopping_cart_id'); // borra shoppingcart

    	$shopping_cart->actualizarFechaReserva($fecha_reserva );
    	$shopping_cart->approve();

    	return Order::create([
    		'pagado' => $pagado,
    		'email' => \Auth::user()->email,
	    	'recipient_name' => \Auth::user()->name,
	    	'user_id' => \Auth::user()->id,
	    	'total' => $shopping_cart->totalUSD(),
	    	'shopping_id' => $shopping_cart->id
    	]);
    }

    public static function findAllByIdUser(){
    	return Order::where('user_id' , '=' , \Auth::user()->id )->get();
    }

    public static function ordersToShopingCarts($orders){

		$shopping_carts = array();

        foreach ($orders as $order) {
            array_push($shopping_carts, $order->shopping()->first());
        }

        return $shopping_carts;
	}
}
