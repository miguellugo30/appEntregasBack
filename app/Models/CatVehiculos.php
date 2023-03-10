<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatVehiculos extends Model
{
    use HasFactory;
    /**
     * Campos que pueden ser modificados
     */
    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'placas',
        'activo',
        'cat_colaborador_id',
    ];
    /**
     * Nombre de la tabla
     */
    protected $table = 'cat_vehiculos';
    /**
     * Se habilitan los timestamps
     */
    public $timestamps = true;
    /**
     * Funcion para obtener solo los registros activos
     */
    public function scopeActive($query)
    {
        return $query->where('activo', 1);
    }
    /*
    |--------------------------------------------------------------------------
    | RELACIONES DE BASE DE DATOS
    |--------------------------------------------------------------------------
    */
    /**
     * Relacion uno a uno con colaborador
     */
    public function colaborador()
    {
        return $this->belongsTo(CatColaboradores::class, 'cat_colaborador_id', 'id');
    }
}
