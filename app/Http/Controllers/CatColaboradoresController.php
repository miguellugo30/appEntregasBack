<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
/**
 * Validaciones
 */
use App\Http\Requests\CatColaboradoresRequest;
/**
 * Resources
 */
use App\Http\Resources\ColaboradorResource;
/**
 * Modelos
 */
use App\Models\CatColaboradores;
use App\Models\User;

class CatColaboradoresController extends Controller
{
    private $colaboradores;
    private $user;

    public function __construct(
            CatColaboradores $colaboradores,
            User $user
        )
    {
        $this->colaboradores = $colaboradores;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (ColaboradorResource::collection( $this->colaboradores->active()->get() ))
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
    public function store(CatColaboradoresRequest $request)
    {
        $newUser = new $this->user;
        $newUser->name = $request->nombre;
        $newUser->email = $request->correo;
        $newUser->password = Hash::make( $request->password );
        $newUser->save();

        $this->colaboradores
            ->create([
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'telefono' => $request->telefono,
                'correo_electronico' => $request->correo,
                'user_id' => $newUser->id
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
        return ( new ColaboradorResource( $this->colaboradores->findOrFail($id) ))
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
    public function update(CatColaboradoresRequest $request, $id)
    {

        $this->colaboradores
            ->where('id', $id)
            ->update([
                'nombre'             => $request->nombre,
                'apellido_paterno'   => $request->apellido_paterno,
                'apellido_materno'   => $request->apellido_materno,
                'telefono'           => $request->telefono,
                'correo_electronico' => $request->correo
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
        $this->colaboradores
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
