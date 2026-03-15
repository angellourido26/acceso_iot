<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use App\Models\Area;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function index()
    {
        $ambientes = Ambiente::with('area')->orderBy('id', 'desc')->get();
        return view('ambientes.index', compact('ambientes'));
    }

    public function create()
    {
        $areas = Area::orderBy('nombre')->get();
        return view('ambientes.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|max:100',
            'ubicacion' => 'required|max:50',
            'estado'    => 'required|max:30',
            'area_id'   => 'nullable|exists:areas,id',
        ]);

        Ambiente::create([
            'nombre'     => $request->nombre,
            'ubicacion'  => $request->ubicacion,
            'estado'     => $request->estado,
            'area_id'    => $request->area_id,
            'created_by' => null,
        ]);

        return redirect()->route('ambientes.index')
                         ->with('success', 'Ambiente creado correctamente');
    }

    public function edit($id)
    {
        $ambiente = Ambiente::findOrFail($id);
        $areas = Area::orderBy('nombre')->get();
        return view('ambientes.edit', compact('ambiente', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'    => 'required|max:100',
            'ubicacion' => 'required|max:50',
            'estado'    => 'required|max:30',
            'area_id'   => 'nullable|exists:areas,id',
        ]);

        $ambiente = Ambiente::findOrFail($id);
        $ambiente->update([
            'nombre'     => $request->nombre,
            'ubicacion'  => $request->ubicacion,
            'estado'     => $request->estado,
            'area_id'    => $request->area_id,
            'updated_by' => null,
        ]);

        return redirect()->route('ambientes.index')
                         ->with('success', 'Ambiente actualizado correctamente');
    }

    public function destroy($id)
    {
        $ambiente = Ambiente::findOrFail($id);
        $ambiente->delete();

        return redirect()->route('ambientes.index')
                         ->with('success', 'Ambiente eliminado correctamente');
    }
}