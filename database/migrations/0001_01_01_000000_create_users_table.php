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
        Schema::create('users', function (Blueprint $table) {
            // ID autoincremental (Llave Primaria)
            $table->id(); 
        
            // Datos personales del usuario / guardia
            $table->string('name');
            $table->string('username')->unique(); // Nombre de usuario único para el login
            $table->string('email')->unique()->nullable(); // Opcional, por si no todos tienen correo
        
            // Credenciales y Seguridad
            $table->string('password'); // Contraseña encriptada
            $table->enum('status', ['activo', 'inactivo'])->default('activo'); // Para bloquear usuarios
            $table->text('two_factor_secret')->nullable(); // Tu clave para el Authenticator

            // Campos nativos de Laravel para recordar sesión y auditoría de fechas
            $table->rememberToken();
            $table->timestamps(); // Crea automáticamente 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
