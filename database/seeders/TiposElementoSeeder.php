<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposElementoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipos_elemento')->insert([
            [
                'id' => 1,
                'nombre' => 'Equipo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'nombre' => 'Inmueble',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}