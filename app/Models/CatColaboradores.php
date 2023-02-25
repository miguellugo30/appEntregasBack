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
    /**
     * Relacion uno a uno con cat_colaboradores
     */
    public function rol()
    {
        return $this->hasOne(CatRoles::class, 'id', 'cat_roles_id');
    }
    /**
     * Relacion uno a muchos con paquetes
     */
    public function paquetes()
    {
        return $this->belongsToMany(CtlPaquetes::class, 'ctl_paquetes_colaborador', 'cat_colaboradores_id', 'ctl_paquetes_id')->withTimestamps();;
    }
    /**
     * Relacion uno a uno con cat_vehiculos
     */
    public function vehiculo()
    {
        return $this->hasOne(CatVehiculos::class, 'id', 'cat_vehiculos_id');
    }

}
