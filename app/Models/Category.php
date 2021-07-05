<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        //campos que agremamos al modelo
        'nombre',
        'descripcion',
        'estado',
    ];

    protected $guarded = []; //campos que no agremamos al modelo

    //relaciones
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'id_category');
    }

    //general

    public static function forMenu()
    {
        return Category::stateOn();
    }

    //scope

    public function scopeStateOn($query)
    {
        return $query->where('estado', '=', 1);
    }
}
