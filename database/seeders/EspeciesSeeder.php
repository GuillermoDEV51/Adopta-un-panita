<?php

namespace Database\Seeders;

use App\Models\Especie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Especie::create(['nombre' => 'Perro']);
        Especie::create(['nombre' => 'Gato']);
        Especie::create(['nombre' => 'Conejo']);
        Especie::create(['nombre' => 'Ave']);
        Especie::create(['nombre' => 'Reptil']);

        
    }
}
