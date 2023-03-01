<?php

namespace App\Http\Controllers;

use App\Http\Resources\ColaboradorResource;
use App\Http\Resources\EstatusResource;
use Illuminate\Http\Request;

/**
 * Resources
 */
use App\Http\Resources\PaquetesEstatusResource;
/**
 * Modelos
 */
use App\Models\CatColaboradores;
use App\Models\CtlPaquetes;

class PaquetesController extends Controller
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
            PaquetesEstatusResource::collection( $this->paquetes->get() )
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paquete = $this->paquetes->findOrFail($id);

        $response['estatus'] = EstatusResource::collection( $paquete->estatus );
        $response['colaborador'] = ColaboradorResource::collection( $paquete->colaborador );

        return response()
                ->json([
                    'success' => true,
                    'message' => '',
                    'data'    => $response
                ]);
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
