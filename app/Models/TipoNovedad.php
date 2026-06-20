<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoNovedad extends Model
{
    use HasFactory;

    // Laravel por defecto busca la tabla en plural ('tipo_novedads'). 
    // Como la renombramos en español, le indicamos explícitamente el nombre real de la tabla:
    protected $table = 'tipos_novedades';

    protected $fillable = ['nombre_tipo', 'descripcion'];

    /**
     * Relación: Un tipo de novedad puede estar asociado a muchos reportes de novedades.
     */
    public function novedades()
    {
        return $this->hasMany(Novedad::class, 'tipo_novedad_id');
    }
}