<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoElemento extends Model
{
    protected $table = 'tipos_elemento';

    protected $fillable = [
        'nombre'
    ];

public function elementos()
{
    return $this->hasMany(Elemento::class, 'tipo_id');
}
}
