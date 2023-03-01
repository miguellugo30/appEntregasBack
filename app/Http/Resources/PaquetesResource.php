<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaquetesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'guia_rastreo' => $this->guia_rastreo,
            'nombre_cliente' => $this->nombre_cliente,
            'telefono' => $this->telefono,
            'correo_electronico' => $this->correo_electronico,
            'direccion' => $this->direccion,
            'no_exterior' => $this->no_exterior,
            'no_interior' => $this->no_interior,
            'colonia' => $this->colonia,
            'alcaldia_municipio' => $this->alcaldia_municipio,
            'codigo_postal' => $this->codigo_postal,
            'estado' => $this->estado,
            'referencias' => $this->referencias,
            'coord_latitud' => $this->coord_latitud,
            'coord_longitud' => $this->coord_longitud,
            'estatus' => EstatusResource::collection( $this->estatus )->first()
        ];
    }
}
