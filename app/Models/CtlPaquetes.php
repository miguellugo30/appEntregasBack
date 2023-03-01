<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtlPaquetes extends Model
{
    use HasFactory;
    /**
     * Campos que pueden ser modificados
     */
    protected $fillable = [
        'guia_rastreo',
        'nombre_cliente',
        'telefono',
        'correo_electronico',
        'direccion',
        'no_exterior',
        'no_interior',
        'colonia',
        'alcaldia_municipio',
        'codigo_postal',
        'estado',
        'referencias',
        'coord_latitud',
        'coord_longitud',
    ];
    /**
     * Nombre de la tabla
     */
    protected $table = 'ctl_paquetes';
    /**
     * Se habilitan los timestamps
     */
    public $timestamps = true;
    /**
     * Relacion uno a muchos con paquetes
     */
    public function colaborador()
    {
        return $this->belongsToMany(CatColaboradores::class, 'ctl_paquetes_colaborador', 'ctl_paquetes_id', 'cat_colaboradores_id')->withTimestamps();
    }
    /**
     * Relacion uno a muchos con paquetes
     */
    public function estatus()
    {
        return $this->belongsToMany(CatEstatusPaquetes::class, 'ctl_paquetes_estatus', 'ctl_paquetes_id', 'cat_estatus_paquetes_id')->withTimestamps()->orderBy('ctl_paquetes_estatus.id', 'DESC');
    }

}
