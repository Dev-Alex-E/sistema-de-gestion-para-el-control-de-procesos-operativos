<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioPruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creamos un usuario de prueba para el desarrollo local
        User::create([
            'name' => 'Alex Trujillo',
            'username' => 'atrujillo',
            'email' => 'alex@ejemplo.com',
            'password' => Hash::make('control2026'), // Contraseña encriptada de forma segura
            'status' => 'activo',
            'two_factor_secret' => null, // Iniciará sin 2FA para obligarlo a configurarlo la primera vez
        ]);
    }
}