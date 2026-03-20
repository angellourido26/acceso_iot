<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
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

    protected $hidden = [
        'password_hash'
    ];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function rol()
    {
        return $this->belongsTo(Role::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

        public function credenciales()
    {
        return $this->hasMany(Credencial::class);
    }
    
    public function logs()
    {
        return $this->hasMany(LogAcceso::class);
    }
}