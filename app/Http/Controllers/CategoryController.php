<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = trim($request->get('searchText'));
        $categories = Category::stateOn()->get();
        return view('warehouse.category.index', [
            "categories" => $categories,
            "searchText" => $query,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("warehouse.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        /* store(Request $request)
        $category = Category::create($request -> all());

        return redirect() -> route('category.edit',$category->id)->with('info', 'Hola que hace'); */

        $category = new Category();
        $category->nombre = $request->get('nombre');
        $category->descripcion = $request->get('descripcion');
        $category->descripcion_secundaria = $request->get('descripcion_secundaria');
        $category->orden = $request->get('orden');
        $category->estado = '1';
        $category->save();

        return Redirect::to('warehouse/category')->with(
            'info',
            'Category guardado con éxito'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // show($id)
        //$category = Category::findOrFail($id);
        //return view('warehouse.category.show', ["category"=>$category]);
        return view('warehouse.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('warehouse.category.edit', [
            "category" => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->all());
        return Redirect::to('warehouse/category')->with(
            'info',
            'Category actualizada con éxito'
        );

        /*
        update(CategoryFormRequest $request, $id){
        $category = Category::findOrFail($id);
        $category -> nombre = $request -> get('nombre');
        $category -> descripcion = $request -> get('descripcion');
        $category -> update();
        return Redirect::to('warehouse/category');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->estado = "0";
        $category->update();
        return Redirect::to('warehouse/category');

        /*
        destroy(Category $category)

        $category->destroy();
        return back()->with('info','Eliminado');*/
    }
}
