<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\LogAcceso;
use App\Models\Ambiente;

class LogAccesoController extends Controller
{
    public function index(Request $request)
    {

    $fecha = $request->fecha ?? Carbon::today();

    $query = LogAcceso::with(['usuario','ambiente','metodo'])
            ->whereDate('created_at', $fecha);

    if ($request->documento) {
        $query->whereHas('usuario', function ($q) use ($request) {
            $q->where('numero_documento', 'LIKE', '%' . $request->documento . '%');
        });
    }

    if ($request->ambiente) {
        $query->where('ambiente_id', $request->ambiente);
    }

    if ($request->accion) {
        $query->where('accion', $request->accion);
    }

    $logs = $query->get();

    $ambientes = Ambiente::all();
    $acciones = LogAcceso::select('accion')->distinct()->pluck('accion');

    return view('logs.index',compact('logs','fecha','ambientes','acciones'));

    }
}
