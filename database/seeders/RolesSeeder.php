<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'nombre' => 'Administrador',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'nombre' => 'Instructor',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'nombre' => 'Coordinador',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'nombre' => 'Aprendiz',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'nombre' => 'Visitante',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
