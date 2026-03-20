<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credencial extends Model
{
    protected $table = 'credenciales';

    protected $fillable = [
        'usuario_id',
        'metodo_id',
        'dato_biometrico',
        'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function metodo()
    {
        return $this->belongsTo(MetodoAutenticacion::class,'metodo_id');
    }
}