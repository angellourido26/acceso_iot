<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoElemento;

class Tipo_elementoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $tipos = TipoElemento::all();
    return view('tipo_elemento.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('tipo_elemento.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:50'
    ]);

    TipoElemento::create($request->all());

    return redirect()->route('tipo_elemento.index')
        ->with('success', 'Tipo creado correctamente');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $tipo = TipoElemento::findOrFail($id);
    return view('tipo_elemento.edit', compact('tipo'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
        'nombre' => 'required|max:50'
    ]);

    $tipo = TipoElemento::findOrFail($id);
    $tipo->update($request->all());

    return redirect()->route('tipo_elemento.index')
        ->with('success', 'Tipo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $tipo = TipoElemento::findOrFail($id);
    $tipo->delete();

    return redirect()->route('tipo_elemento.index')
        ->with('success', 'Tipo eliminado correctamente');
    }
}
