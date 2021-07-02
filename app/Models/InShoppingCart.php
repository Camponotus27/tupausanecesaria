<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        //campos que agremamos al modelo
        'shopping_cart_id',
        'product_id',
        'crema',
        'azucar',
        'servir',
        'complements',
    ];

    protected $guarded = []; //campos que no agremamos al modelo

    public static function deleteIDProduct($product_id, $shopping_cart_id)
    {
        return InShoppingCart::where([
            ["product_id", $product_id],
            ["shopping_cart_id", $shopping_cart_id],
        ])
            ->first()
            ->delete();
    }

    public static function productsCount($shopping_cart_id)
    {
        return InShoppingCart::where(
            "shopping_cart_id",
            $shopping_cart_id
        )->count();
    }
}
