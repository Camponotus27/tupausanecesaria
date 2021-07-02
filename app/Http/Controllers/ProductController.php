<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Complement;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = trim($request->get('searchText'));
        $products = Product::where('estado', '=', '1')->paginate(7);

        $complements = Complement::orderNombre()->get();

        $cant_complements = $complements->count();

        return view('warehouse.product.index', [
            "products" => $products,
            "searchText" => $query,
            "cant_complements" => $cant_complements,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $complements = Complement::orderNombre()->get();
        $categorys = Category::stateOn()->get();

        return view(
            "warehouse.product.create",
            compact('complements', 'categorys')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $product = new Product();
        if (!empty($request->get('cant_complements'))) {
            $product->cant_complements = $request->get('cant_complements');
        }
        $product->id_category = $request->get('id_category');
        $product->nombre = $request->get('nombre');
        $product->crema = $request->get('crema');
        $product->azucar = $request->get('azucar');
        $product->descripcion = $request->get('descripcion');
        $product->stock = $request->get('stock');
        $product->precio = $request->get('precio');
        $product->estado = '1';

        if (empty($product->precio)) {
            $product->precio = 0;
        }

        if (!empty($request->get('crema'))) {
            $product->crema = 1;
        } else {
            $product->crema = 0;
        }

        if (!empty($request->get('azucar'))) {
            $product->azucar = 1;
        } else {
            $product->azucar = 0;
        }

        if (!$product->storageImagenFromCropit($request)) {
            return redirect('warehouse/product')->with(
                'danger',
                'No se pudo guardar la imagen del producto'
            );
        }

        $product->save();

        $product->complements()->sync($request->get('complements'));

        return redirect('warehouse/product')->with(
            'info',
            'Product guardado con éxito'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('warehouse.product.show', [
            "product" => Product::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $complements = Product::chekedComplements($product);
        $categorys = Category::stateOn()->get();

        return view(
            'warehouse.product.edit',
            compact('product', 'complements', 'categorys')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        $product = Product::findOrFail($id);
        $product->id_category = $request->get('id_category');
        $product->cant_complements = $request->get('cant_complements');
        $product->nombre = $request->get('nombre');
        $product->crema = $request->get('crema');
        $product->azucar = $request->get('azucar');
        $product->descripcion = $request->get('descripcion');
        $product->stock = $request->get('stock');
        $product->precio = $request->get('precio');

        if (!empty($request->get('crema'))) {
            $product->crema = 1;
        } else {
            $product->crema = 0;
        }

        if (!empty($request->get('azucar'))) {
            $product->azucar = 1;
        } else {
            $product->azucar = 0;
        }

        $product->storageImagenFromCropit($request);

        $product->update();

        $product->complements()->sync($request->get('complements'));

        return redirect('warehouse/product')->with(
            'info',
            'Product actualizado con éxito'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::findOrFail($id);
        $product->estado = "0";
        $product->update();
        return redirect('warehouse/product');
    }
}
