<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAcceso extends Model
{
    protected $table = 'logs_acceso';

    protected $fillable = [
        'usuario_id',
        'ambiente_id',
        'metodo_id',
        'accion'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function ambiente()
    {
        return $this->belongsTo(Ambiente::class);
    }

    public function metodo()
    {
        return $this->belongsTo(MetodoAutenticacion::class,'metodo_id');
    }
}