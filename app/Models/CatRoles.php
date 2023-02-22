<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatRoles extends Model
{
    use HasFactory;
    /**
     * Campos que pueden ser modificados
     */
    protected $fillable = [
        'nombre',
    ];
    /**
     * Nombre de la tabla
     */
    protected $table = 'cat_roles';
    /**
     * Se habilitan los timestamps
     */
    public $timestamps = true;
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
        return $this->belongsTo(CatColaboradores::class, 'cat_roles_id', 'id');
    }
}
