<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table = 'elementos';

protected $fillable = [
    'nombre',
    'tipo_id',
    'ambiente_id',
    'estado',
    'serial_placa_sena',
    'created_by',
    'updated_by'
];

public function tipo()
{
    return $this->belongsTo(TipoElemento::class, 'tipo_id');
}

public function ambiente()
{
    return $this->belongsTo(Ambiente::class, 'ambiente_id');
}
}
