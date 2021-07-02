<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsComplements extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'complement_id', 'cant_porcion'];
}
