<?php

namespace App\Http\Controllers;

use App\Models\Complement;
use App\Http\Requests\ComplementFormRequest;
use Illuminate\Http\Request;

class ComplementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complements = Complement::paginate();
        return view('complements.index', compact('complements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComplementFormRequest $request)
    {
        Complement::create($request->all());
        return redirect()
            ->route('complements.index')
            ->with('info', 'Complement guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complement  $complement
     * @return \Illuminate\Http\Response
     */
    public function show(Complement $complement)
    {
        return "soy el show de $complement->nombre";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complement  $complement
     * @return \Illuminate\Http\Response
     */
    public function edit(Complement $complement)
    {
        return view('complements.edit', compact('complement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complement  $complement
     * @return \Illuminate\Http\Response
     */
    public function update(
        ComplementFormRequest $request,
        Complement $complement
    ) {
        $complement->update($request->all());
        return redirect()
            ->route('complements.index')
            ->with('info', 'Complement actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complement  $complement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complement $complement)
    {
        $complement->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
