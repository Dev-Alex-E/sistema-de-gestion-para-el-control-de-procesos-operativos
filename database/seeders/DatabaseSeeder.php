<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permiso;
use App\Models\Area;
use App\Models\TipoNovedad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. CREAR ROLES
        $adminRole = Role::create([
            'nombre_rol' => 'Administrador',
            'descripcion' => 'Acceso total al sistema y gestión de usuarios'
        ]);

        $guardiaRole = Role::create([
            'nombre_rol' => 'Guardia',
            'descripcion' => 'Personal operativo encargado de reportar novedades'
        ]);


        // 2. CREAR PERMISOS
        $permisoCrear = Permiso::create([
            'nombre_permiso' => 'crear_novedades',
            'descripcion' => 'Permite registrar nuevos reportes de seguridad'
        ]);

        $permisoUsuarios = Permiso::create([
            'nombre_permiso' => 'gestionar_usuarios',
            'descripcion' => 'Permite crear, editar o inactivar usuarios del sistema'
        ]);


        // 3. ASIGNAR PERMISOS A ROLES (Tablas Pivote)
        // El admin tiene ambos permisos
        $adminRole->permisos()->attach([$permisoCrear->id, $permisoUsuarios->id]);
        // El guardia solo puede crear novedades
        $guardiaRole->permisos()->attach([$permisoCrear->id]);


        // 4. CREAR USUARIO ADMINISTRADOR DE PRUEBA
        $adminUser = User::create([
            'name' => 'Alex Trujillo',
            'username' => 'admin_alex',
            'email' => 'alex@seguridad.com',
            'password' => Hash::make('12345678'), // Contraseña encriptada de prueba
            'two_factor_secret' => null, // Se puede activar después desde el sistema
            'status' => 'activo'
        ]);

        // Asignarle el rol de Administrador al usuario creado
        $adminUser->roles()->attach($adminRole->id);


        // 5. CREAR ÁREAS / PUESTOS DE CONTROL DE PRUEBA
        Area::create([
            'nombre_area' => 'Almacén Central',
            'descripcion' => 'Zona de resguardo de mercancía y repuestos de alto valor'
        ]);

        Area::create([
            'nombre_area' => 'Entrada Principal / Garita 1',
            'descripcion' => 'Control de acceso peatonal y vehicular de la planta'
        ]);


        // 6. CREAR TIPOS DE NOVEDADES DE PRUEBA
        TipoNovedad::create([
            'nombre_tipo' => 'Falla de Infraestructura',
            'descripcion' => 'Problemas con luminarias, cercado eléctrico o cámaras'
        ]);

        TipoNovedad::create([
            'nombre_tipo' => 'Hurto / Robo',
            'descripcion' => 'Sustracción o intento de sustracción de bienes de la empresa'
        ]);

        TipoNovedad::create([
            'nombre_tipo' => 'Ronda Rutinaria',
            'descripcion' => 'Reporte estándar de inspección sin novedades negativas'
        ]);
    }
}