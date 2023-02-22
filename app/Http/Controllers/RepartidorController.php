<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * Resources
 */
use App\Http\Resources\ColaboradorResource;
/**
 * Modelos
 */
use App\Models\CatColaboradores;

class RepartidorController extends Controller
{
    private $colaboradores;


    public function __construct(
            CatColaboradores $colaboradores
        )
    {
        $this->colaboradores = $colaboradores;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (ColaboradorResource::collection( $this->colaboradores->active()->where('cat_roles_id', 2)->orderBy('id', 'asc')->get() ))
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
