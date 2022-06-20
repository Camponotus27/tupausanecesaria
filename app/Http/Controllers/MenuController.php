<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('estado', '=', '1')->paginate(10);
        $categories = Category::orderBy('orden', 'asc')->get();

        return view('menu.index', compact(['products', 'categories']));
    }
}
