<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_role', 'descripcion'];

    /**
     * Relación: Un rol pertenece a muchos usuarios (Tabla pivote: role_user).
     */
    public function users()
{
    // Hacemos lo mismo aquí para que la relación inversa sepa cómo buscar en la tabla pivote
    return $this->belongsToMany(User::class, 'role_user', 'rol_id', 'user_id');
}

    /**
     * Relación: Un rol tiene muchos permisos (Tabla pivote: permisos_roles).
     */
    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'permisos_roles', 'rol_id', 'permiso_id');
    }
}