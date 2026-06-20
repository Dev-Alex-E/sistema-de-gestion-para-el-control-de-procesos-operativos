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
        Schema::create('tipos_novedades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipo', 100)->unique(); // Ej: 'Hurto', 'Falla de Infraestructura', 'Ronda rutinaria'
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_novedades');
    }
};
