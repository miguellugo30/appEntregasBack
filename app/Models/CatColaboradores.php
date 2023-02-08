<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatColaboradores extends Model
{
    use HasFactory;
    /**
     * Campos que pueden ser modificados
     */
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'correo_electronico',
        'ruta_perfil',
        'activo',
        'user_id',
        'created_at',
        'updated_at'
    ];
    /**
     * Nombre de la tabla
     */
    protected $table = 'cat_colaboradores';
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
     * Relacion uno a uno con usuarios
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}