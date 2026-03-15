<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id', 'asc')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50'
        ]);

        Role::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('roles.index')
                         ->with('success', 'Rol creado correctamente');
    }

    public function edit($id)
    {
        $rol = Role::findOrFail($id);
        return view('roles.edit', compact('rol'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:50'
        ]);

        $rol = Role::findOrFail($id);
        $rol->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('roles.index')
                         ->with('success', 'Rol actualizado correctamente');
    }

    public function destroy($id)
    {
        $rol = Role::findOrFail($id);
        $rol->delete();

        return redirect()->route('roles.index')
                         ->with('success', 'Rol eliminado correctamente');
    }
}