<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CatColaboradoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->isMethod('PUT'))
        {
            if ( \Str::length( $this->password ) > 0 )
            {
                return [
                    'nombre'             => 'required',
                    'apellido_paterno'   => 'required',
                    'apellido_materno'   => 'required',
                    'telefono'           => 'required',
                    'password'           => 'required|min:6|confirmed',
                    'password_confirmation'   => 'required|min:6',
                ];
            }

            return [
                'nombre'             => 'required',
                'apellido_paterno'   => 'required',
                'apellido_materno'   => 'required',
                'telefono'           => 'required',
            ];
        }

        return [
            'nombre'             => 'required',
            'apellido_paterno'   => 'required',
            'apellido_materno'   => 'required',
            'telefono'           => 'required',
            'correo_electronico' => 'required|email|unique:users,email',
            'password'           => 'required|min:6|confirmed',
            'password_confirmation'   => 'required|min:6',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Error en validación de campos',
                'data'    => $validator->errors()
            ])
        );
    }

    public function messages()
    {
        return [
            'nombre.required'                => 'Nombre es requerido',
            'apellido_paterno.required'      => 'Apellido Paterno es requerido',
            'apellido_materno.required'      => 'Apellido Materno es requerido',
            'telefono.required'              => 'Telefono es requerido',
            'correo_electronico.required'    => 'Correo Electronico es requerido',
            'correo_electronico.email'       => 'Correo Electronico no es un correo valido',
            'correo_electronico.unique'      => 'El Correo Electronico ya esta registrado',
            'password.required'              => 'Contraseña es requerido',
            'password.confirmed'             => 'Las contraseñas no coinciden',
            'password.min'                   => 'La contraseña debe contener minimo 6 caracteres',
            'password_confirmation.required' => 'Confirmacion de contraseña es requerido',
            'password_confirmation.min'      => 'La confirmacion de contraseña debe contener minimo 6 caracteres',
        ];
    }
}
