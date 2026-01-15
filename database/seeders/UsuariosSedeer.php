<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuarios;

class UsuariosSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuarios::create([
            'ci' => 12345678,
            'nombre' => 'Admin',
            'apellido' => 'Admin',
            'password' => bcrypt('admin123'),
            'id_rol' => 1,

        ]);
    }
}
