<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add 'Refugio' role if it doesn't exist
        if (DB::table('roles')->where('name', 'Refugio')->doesntExist()) {
            DB::table('roles')->insert([
                'name' => 'Refugio',
                'description' => 'Role for Shelter accounts',
            ]);
        }

        Schema::table('refugios', function (Blueprint $table) {
            $table->string('redes_sociales')->nullable()->after('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('refugios', function (Blueprint $table) {
            $table->dropColumn('redes_sociales');
        });
        
        // We typically don't remove the role on rollback as it might be used by users, 
        // but for strict reversibility:
        // \Illuminate\Support\Facades\DB::table('roles')->where('name', 'Refugio')->delete();
    }
};
