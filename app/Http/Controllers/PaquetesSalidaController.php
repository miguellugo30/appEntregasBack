<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * Resources
 */
use App\Http\Resources\PaquetesSalidaResource;
/**
 * Modelos
 */
use App\Models\CatColaboradores;
use App\Models\CtlPaquetes;

class PaquetesSalidaController extends Controller
{
    private $paquetes;
    private $colaborador;

    public function __construct(
            CtlPaquetes $paquetes,
            CatColaboradores $colaborador
        )
    {
        $this->paquetes    = $paquetes;
        $this->colaborador = $colaborador;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (
            PaquetesSalidaResource::collection(
                $this->paquetes
                ->select('ctl_paquetes.id', 'ctl_paquetes.guia_rastreo', 'ctl_paquetes.nombre_cliente')
                ->leftJoin('ctl_paquetes_colaborador', 'ctl_paquetes.id', '=', 'ctl_paquetes_colaborador.ctl_paquetes_id')
                ->whereNull('ctl_paquetes_colaborador.ctl_paquetes_id')
                ->get()
            )
        )
        ->additional([
            'message' => '',
            'success' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paquetesId = [];
        /**
         * obtenemos los ID de los paquetes a relacionar
         */
        for ($i=0; $i < count($request->paquetes); $i++)
        {
            $data = $request->paquetes[$i];
            array_push($paquetesId, $data['id']);
        }
        /**
         * Obtenemos la informacion del colaborador
         */
        $colaborador = $this->colaborador::find($request->colaborador_id);
        /**
         * Relacionamos los paquetes al colaborador
         */
        $colaborador
            ->paquetes()
            ->attach($paquetesId);

        return response()
                ->json([
                    'success' => true,
                    'message' => 'Se ha guardado la información correctamente.',
                    'data'    => ''
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
