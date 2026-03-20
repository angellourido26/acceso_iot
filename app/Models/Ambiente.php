<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $fillable = [
        'nombre',
        'ubicacion',
        'estado',
        'area_id',
        'created_by',
        'updated_by',
        'disable_by',
        'disable_at',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    
        public function elementos()
    {
        return $this->hasMany(Elemento::class);
    }

    public function logs()
    {
        return $this->hasMany(LogAcceso::class);
    }
}