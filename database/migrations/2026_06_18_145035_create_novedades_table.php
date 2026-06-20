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
    Schema::create('novedades', function (Blueprint $table) {
        $table->id(); // Llave primaria automática
        
        // --- LLAVES FORÁNEAS (RELACIONES) ---
        
        // 1. Relación con Usuarios (Guardias): Quién reporta
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
        // 2. Relación con Áreas / Puestos: Dónde ocurrió
        $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');
        
        // 3. Relación con Tipos de Novedades: Qué tipo de incidente es (Ajuste Opción A)
        $table->foreignId('tipo_novedad_id')->constrained('tipos_novedades')->onDelete('cascade');
        
        // --- CAMPOS PROPIOS DEL REPORTE ---
        $table->text('descripcion');   // Detalle minucioso de lo sucedido
        $table->enum('gravedad', ['Baja', 'Media', 'Alta'])->default('Baja'); // Nivel de alerta
        
        $table->timestamps(); // Registra de forma automática 'created_at' y 'updated_at'
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novedades');
    }
};
