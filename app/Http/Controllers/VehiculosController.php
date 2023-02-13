<?php

namespace App\Http\Controllers;

/**
 * Validaciones
 */
use App\Http\Requests\CatVehiculosRequest;
/**
 * Resources
 */
use App\Http\Resources\VehiculosResource;
/**
 * Modelos
 */
use App\Models\CatVehiculos;

class VehiculosController extends Controller
{
    private $vehiculos;

    public function __construct(
            CatVehiculos $vehiculos
        )
    {
        $this->vehiculos = $vehiculos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (VehiculosResource::collection( $this->vehiculos->active()->get() ))
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
    public function store(CatVehiculosRequest $request)
    {
        $this->vehiculos
        ->create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'placas' => $request->placas
        ]);

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
        return ( new VehiculosResource( $this->vehiculos->findOrFail($id) ))
                ->additional([
                    'message' => '',
                    'success' => true
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatVehiculosRequest $request, $id)
    {
        $this->vehiculos
            ->where('id', $id)
            ->update([
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'anio' => $request->anio,
                'placas' => $request->placas,
                'tipo' => $request->tipo
            ]);

        return response()
                ->json([
                    'success' => true,
                    'message' => 'Se ha actualizado la información correctamente.',
                    'data'    => ''
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->vehiculos
            ->where('id', $id)
            ->update(['activo' => 0]);

        return response()
                ->json([
                    'success' => true,
                    'message' => 'Se ha eliminado la información correctamente.',
                    'data'    => ''
                ]);
    }
}
