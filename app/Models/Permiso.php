<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_permiso', 'descripcion'];

    /**
     * Relación: Un permiso puede pertenecer a muchos roles (Tabla pivote: permisos_roles).
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permisos_roles', 'permiso_id', 'rol_id');
    }
}