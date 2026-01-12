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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');

            $table->unsignedBigInteger('id_especie')->nullable();
            $table->foreign('id_especie')->references('id')->on('especies')->onDelete('set null');

            $table->unsignedBigInteger('id_refugio')->nullable();
            $table->foreign('id_refugio')->references('id')->on('refugio')->onDelete('set null');
            
            
            $table->integer('edad')->nullable();
            $table->enum('genero', ['Macho', 'Hembra'])->nullable();
            $table->enum('estado', ['disponible', 'pendiente', 'adoptado'])->default('disponible');
            $table->enum('tamano', ['Pequeño', 'Mediano', 'Grande'])->nullable();
            $table->text('descripcion')->nullable();
            $table->string('documentacion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
