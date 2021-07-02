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

        return view('menu.index', ["products" => $products]);

        // TODO: para que es esto?
        $query = trim($request->get('searchText'));

        $category = Category::forMenu()->get();

        return view('menu.index', [
            "categorys" => $category,
            "searchText" => $query,
        ]);
    }
}
