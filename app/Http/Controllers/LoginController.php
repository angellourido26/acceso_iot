<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function login(Request $request)
    {

    $credentials = [
    'correo' => $request->correo,
    'password' => $request->password
    ];

    $remember = $request->remember ? true : false;

    if(Auth::attempt($credentials,$remember)){

    return redirect()->route('dashboard');

    }

    return back()->with('error','Credenciales incorrectas');

    }
}
