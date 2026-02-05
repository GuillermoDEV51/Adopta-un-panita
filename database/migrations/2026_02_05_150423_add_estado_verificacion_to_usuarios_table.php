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
        Schema::table('usuarios', function (Blueprint $table) {
            $table->enum('estado_verificacion', ['no_verificado', 'pendiente', 'verificado', 'rechazado'])
                  ->default('no_verificado')
                  ->after('telefono'); // Se agrega después de teléfono u otro campo existente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('estado_verificacion');
        });
    }
};
