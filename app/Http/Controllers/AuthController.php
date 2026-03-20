<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('correo', $request->correo)->first();

        if ($usuario && Hash::check($request->password, $usuario->password_hash)) {

            Session::put('usuario', $usuario);

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }

    public function logout()
    {
        Session::forget('usuario');
        return redirect()->route('login');
    }
}
