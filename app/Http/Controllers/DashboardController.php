<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Ambiente;
use App\Models\Usuario;
use App\Models\Role;
use App\Models\Elemento;
use App\Models\TipoElemento;
use App\Models\LogAcceso;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAreas = Area::count();
        $totalAmbientes = Ambiente::count();
        $totalUsuarios = Usuario::count();
        $totalRoles = Role::count();
        $totalElementos = Elemento::count();
        $totalTipos = TipoElemento::count();
        $totalLogAcceso = LogAcceso::count();

        return view('dashboard', compact(
            'totalAreas',
            'totalAmbientes',
            'totalUsuarios',
            'totalRoles',
            'totalElementos',
            'totalTipos',
            'totalLogAcceso'
        ));
    }
}