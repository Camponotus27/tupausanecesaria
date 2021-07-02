<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        //campos que agremamos al modelo
        'status',
        'customid',
        'fecha_reserva',
    ];

    ///////link

    public function approve()
    {
        $this->updateCustomIDAndStatus();
    }

    public function generateCustomID()
    {
        return md5("$this->id  $this->update_at");
    }

    public function updateCustomIDAndStatus()
    {
        $this->status = 'aprobado';
        $this->customid = $this->generateCustomID();
        $this->save();
    }

    ////////////

    public function inShoppingCarts()
    {
        return $this->hasMany('App\Models\InShoppingCart');
    }

    public function products()
    {
        return $this->belongsToMany(
            'App\Models\Product',
            'in_shopping_carts'
        )->withPivot(['crema', 'azucar', 'servir', 'complements']);
    }

    public function order()
    {
        return $this->hasOne('App\Models\Order', 'shopping_id')->first();
    }

    public function actualizarFechaReserva($fechaReserva = null)
    {
        if ($fechaReserva != null) {
            list($date, $guion, $time) = explode(" ", $fechaReserva);
            list($day, $month, $year) = explode("/", $date);
            list($hours, $minutes) = explode(":", $time);

            $unionFechaResera =
                $year .
                "-" .
                $month .
                "-" .
                $day .
                " " .
                $hours .
                ":" .
                $minutes .
                ":00";

            $this->fecha_reserva = $unionFechaResera;
            $this->update();
        }
    }

    public function productsSize()
    {
        return $this->products()->count();
    }

    public function total()
    {
        return $this->products()->sum('precio');
    }

    public function totalUSD()
    {
        return $this->total() / ShoppingCart::actualUS();
    }

    public static function actualUS()
    {
        if (Cookie::get('USD') == null) {
            $apiUrl = 'https://mindicador.cl/api';
            if (ini_get('allow_url_fopen')) {
                $json = file_get_contents($apiUrl);
            } else {
                $curl = curl_init($apiUrl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $json = curl_exec($curl);
                curl_close($curl);
            }

            $dailyIndicators = json_decode($json);

            Cookie::queue('USD', $dailyIndicators->dolar->valor, 60 * 24 * 30);

            return $dailyIndicators->dolar->valor;
        } else {
            return Cookie::get('USD');
        }

        return "Error";
    }

    public static function findOrCreateBySessionID($shopping_cart_id)
    {
        if ($shopping_cart_id) {
            //buscamos carrito con este id
            $shopping_cart = ShoppingCart::findBySession($shopping_cart_id);
            if ($shopping_cart) {
                return $shopping_cart;
            }
        }

        return ShoppingCart::createWithoutSession();
    }

    public static function findBySession($shopping_cart_id)
    {
        return ShoppingCart::find($shopping_cart_id);
    }

    public static function createWithoutSession()
    {
        return ShoppingCart::create([
            "status" => "incompleto",
        ]);
    }
}
