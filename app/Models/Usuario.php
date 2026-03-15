<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'password_hash',
        'tipo_documento',
        'numero_documento',
        'estado',
        'telefono',
        'rol_id',
        'area_id'
    ];

    public function rol()
    {
        return $this->belongsTo(Role::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}