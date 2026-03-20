<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\LogAcceso;

class LogAccesoController extends Controller
{
    public function index(Request $request)
    {

    $fecha = $request->fecha ?? Carbon::today();

    $logs = LogAcceso::with(['usuario','ambiente','metodo'])
            ->whereDate('created_at',$fecha)
            ->get();

    return view('logs.index',compact('logs','fecha'));

    }
}
