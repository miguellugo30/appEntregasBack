<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Resources
 */
use App\Http\Resources\UserResource;
/**
 * Modelos
 */
use App\Models\User;

class LoginController extends Controller
{
    private $user;

    public function __construct(
            User $user
        )
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
                ->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                    'data'    => ''
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

        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password')))
        {
            return response()->json([
                'token' => $request->user()->createToken('auth_token')->plainTextToken,
                'data' => new UserResource( $this->user->where('email', $request->email)->first() ),
                'message' => 'Inicio de sesion correcto',
                'success' => true
            ]);
        }

        return response()->json([
            'token' => '',
            'message' => 'El correo o contraseña no es valida',
            'success' => false
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

    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }
}
