<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatEstatusPaquetes extends Model
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
    protected $table = 'cat_estatus_paquete';
    /**
     * Se habilitan los timestamps
     */
    public $timestamps = true;
    /**
     * Relacion uno a muchos con paquetes
     */
    public function paquetes()
    {
        return $this->belongsToMany(CtlPaquetes::class, 'ctl_paquetes_estatus', 'ctl_paquetes_id', 'cat_estatus_paquetes_id')->withTimestamps();;
    }
}
