<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::create([
            'name' => 'admin',
            'description' => 'Administrator with full access'
        ]);

        Roles::create([
            'name' => 'user',
            'description' => 'Regular user with limited access'
        ]);

        Roles::create([
            'name' => 'Voluntario',
            'description' => 'Acceso a funciones de voluntariado'
        ]);
    }
}
