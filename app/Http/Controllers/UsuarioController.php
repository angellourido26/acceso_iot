<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Role;
use App\Models\Area;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = Usuario::with(['rol','area'])->get();
        return view('usuarios.index', compact('usuarios'));
    }


    public function create()
    {
        $roles = Role::all();
        $areas = Area::all();

        return view('usuarios.create', compact('roles','areas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:usuarios',
            'numero_documento' => 'required'
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'password_hash' => bcrypt($request->password),
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'estado' => $request->estado,
            'telefono' => $request->telefono,
            'rol_id' => $request->rol_id,
            'area_id' => $request->area_id
        ]);

        return redirect()->route('usuarios.index')->with('success','Usuario creado correctamente');
    }


    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $roles = Role::all();
        $areas = Area::all();

        return view('usuarios.edit', compact('usuario','roles','areas'));
    }


    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success','Usuario actualizado');
    }


    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success','Usuario eliminado');
    }
}