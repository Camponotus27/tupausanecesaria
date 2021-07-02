<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complement extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'stock', 'descripcion'];

    public function scopeOrderNombre($query)
    {
        return $query->orderBy('nombre');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
