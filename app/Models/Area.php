<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['nombre'];

        public function ambientes()
    {
        return $this->hasMany(Ambiente::class);
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
