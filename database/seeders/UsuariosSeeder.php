<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class UsuariosSeeder extends Seeder
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
            'password' => Hash::make('admin123'),
            'id_rol' => 1,

        ]);

        Usuarios::created([
            ''
        ]);
    }
}
