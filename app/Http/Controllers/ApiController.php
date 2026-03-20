<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\LogAcceso;


class ApiController extends Controller
{

public function validarDocumento($documento) {

        $usuario = Usuario::where('numero_documento',$documento)
                        ->where('estado','Activo')
                        ->first();

        if(!$usuario){
            return response()->json([
            "status"=>false,
            "mensaje"=>"Usuario no encontrado"
            ]);
        }

        LogAcceso::create([
            'usuario_id'=>$usuario->id,
            'ambiente_id'=>1,
            'metodo_id'=>1,
            'accion'=>'Ingreso autorizado'
        ]);

        return response()->json([
            "status"=>true,
            "nombre"=>$usuario->nombre
        ]);

    }
}
