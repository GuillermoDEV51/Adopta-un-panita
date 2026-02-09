<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::create([
            'name' => 'admin',
            'description' => 'Administrator with full access',
        ]);

        Roles::create([
            'name' => 'user',
            'description' => 'Regular user with limited access',
        ]);

        Roles::create([
            'name' => 'Voluntario',
            'description' => 'Acceso a funciones de voluntariado',
        ]);
        Roles::create([
            'name' => 'Refugio',
            'description' => 'Acceso a funciones de refugio',
        ]);
    }
}
