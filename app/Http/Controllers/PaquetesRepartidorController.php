<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Resources
 */
use App\Http\Resources\PaquetesResource;
/**
 * Modelos
 */
use App\Models\CatColaboradores;
use App\Models\CtlPaquetes;

class PaquetesRepartidorController extends Controller
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
    public function index($id)
    {

        $colaborador = $this->colaborador::findOrFail($id);

        return (
            PaquetesResource::collection(
                $this->paquetes
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
        //
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
