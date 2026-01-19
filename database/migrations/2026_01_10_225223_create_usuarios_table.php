<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('ci')->unique();
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->string('password');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('telefono')->nullable();

           $table->foreignId('id_rol')
            ->constrained('roles')
            ->default(2)
            ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
