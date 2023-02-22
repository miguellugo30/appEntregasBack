<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        return (ColaboradorResource::collection( $this->colaboradores->active()->orderBy('id', 'asc')->get() ))
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
        $newUser->email = $request->correo_electronico;
        $newUser->password = Hash::make( $request->password );
        $newUser->save();

        $colaborador = $this->colaboradores
            ->create([
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'telefono' => $request->telefono,
                'correo_electronico' => $request->correo_electronico,
                'user_id' => $newUser->id,
                'cat_roles_id' => $request->rol
            ]);

        if($request->ruta_perfil != null)
        {
            $img = substr($request->ruta_perfil, strpos($request->ruta_perfil, ",")+1);
            $data = base64_decode($img);

            Storage::disk('public')->put( 'colab_'.$colaborador->id.'.jpeg', $data);

            $this->colaboradores
            ->where('id', $colaborador->id)
            ->update([
                'ruta_perfil' => 'colab_'.$colaborador->id.'.jpeg'
            ]);
        }

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

        if ( file_exists( public_path( 'storage/colab_'.$id.'.jpeg') ) )
        {
            $data = "data:image/jpeg;base64,".base64_encode (file_get_contents( public_path( 'storage/colab_'.$id.'.jpeg') ) );

            return response()
                ->json([
                    'success' => true,
                    'message' => '',
                    'data'    => $data
                ]);
        }
        else
        {
            return response()
                ->json([
                    'success' => false,
                    'message' => 'El usuario no tiene foto de perfil',
                    'data'    => ''
                ]);
        }
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
                'nombre'           => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'telefono'         => $request->telefono,
                'cat_roles_id'     => $request->rol
            ]);

        $this->user
            ->where('email', $request->correo_electronico)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        if($request->ruta_perfil != null)
        {
            $img = substr($request->ruta_perfil, strpos($request->ruta_perfil, ",")+1);
            $data = base64_decode($img);

            Storage::disk('public')->put( 'colab_'.$id.'.jpeg', $data);

            $this->colaboradores
            ->where('id', $id)
            ->update([
                'ruta_perfil' => 'colab_'.$id.'.jpeg'
            ]);
        }

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
