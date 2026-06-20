<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    // Campos que se pueden llenar desde los formularios
    protected $fillable = ['nombre_area', 'descripcion'];

    /**
     * Relación: En un área se pueden registrar muchas novedades.
     */
    public function novedades()
    {
        return $this->hasMany(Novedad::class);
    }
}