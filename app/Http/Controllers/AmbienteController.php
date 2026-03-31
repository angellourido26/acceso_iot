<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use App\Models\Area;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Ambiente::with('area');

        if ($request->estado) {
            $query->where('estado', $request->estado);
        }

        if ($request->area_id) {
            $query->where('area_id', $request->area_id);
        }

        $query->orderByRaw("CASE WHEN estado = 'Activo' THEN 1 ELSE 2 END")
              ->orderBy('id', 'desc');

        $ambientes = $query->get();

        $areas = \App\Models\Area::orderBy('nombre')->get();

        return view('ambientes.index', compact('ambientes', 'areas'));
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