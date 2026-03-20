<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoAutenticacion extends Model
{
    protected $table = 'metodo_autenticacion';

    protected $fillable = [
        'tipo_metodo',
        'descripcion'
    ];

    public function credenciales()
    {
        return $this->hasMany(Credencial::class,'metodo_id');
    }

    public function logs()
    {
        return $this->hasMany(LogAcceso::class,'metodo_id');
    }
}