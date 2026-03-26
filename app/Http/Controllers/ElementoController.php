<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elemento;
use App\Models\TipoElemento;
use App\Models\Ambiente;

class ElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $elementos = Elemento::with('tipo','ambiente')->get();
    return view('elementos.index', compact('elementos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoElemento::all();
        $ambientes = Ambiente::all();

    return view('elementos.create', compact('tipos','ambientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:100',
        'tipo_id' => 'nullable|exists:tipos_elemento,id',
        'ambiente_id' => 'nullable|exists:ambientes,id',
        'estado' => 'nullable|max:30',
        'serial_placa_sena' => 'required|max:30'
    ]);

    Elemento::create([
        'nombre' => $request->nombre,
        'tipo_id' => $request->tipo_id,
        'ambiente_id' => $request->ambiente_id,
        'estado' => $request->estado,
        'serial_placa_sena' => $request->serial_placa_sena,
        'created_by' => auth()->id()
    ]);

    return redirect()->route('elementos.index')
        ->with('success', 'Elemento creado correctamente');
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
          $elemento = Elemento::findOrFail($id);
    $tipos = TipoElemento::all();
    $ambientes = Ambiente::all();

    return view('elementos.edit', compact('elemento', 'tipos', 'ambientes'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|max:100',
        'tipo_id' => 'nullable|exists:tipos_elemento,id',
        'ambiente_id' => 'nullable|exists:ambientes,id',
        'estado' => 'nullable|max:30',
        'serial_placa_sena' => 'required|max:30'
    ]);

    $elemento = Elemento::findOrFail($id);

    $elemento->update([
        'nombre' => $request->nombre,
        'tipo_id' => $request->tipo_id,
        'ambiente_id' => $request->ambiente_id,
        'estado' => $request->estado,
        'serial_placa_sena' => $request->serial_placa_sena,
        'updated_by' => auth()->id()
    ]);

    return redirect()->route('elementos.index')
        ->with('success', 'Elemento actualizado correctamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $elemento = Elemento::findOrFail($id);
        $elemento->delete();

        return redirect()->route('elementos.index')
            ->with('success', 'Elemento eliminado correctamente');
    }
}
