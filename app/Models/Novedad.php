<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id',
        'tipo_novedad_id',
        'descripcion',
        'gravedad'
    ];

    /**
     * Relación: La novedad pertenece al Usuario/Guardia que la creó.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: La novedad ocurrió en un Área específica.
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Relación: La novedad corresponde a un Tipo de Novedad específico.
     */
    public function tipoNovedad()
    {
        return $this->belongsTo(TipoNovedad::class, 'tipo_novedad_id');
    }
}