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
        return [
            'nombre'           => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'telefono'         => 'required',
            'correo'           => 'required|email',
            'password'           => 'required|min:6',
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
            'nombre.required'           => 'Nombre es requerido',
            'apellido_paterno.required' => 'Apellido Paterno es requerido',
            'apellido_materno.required' => 'Apellido Materno es requerido',
            'telefono.required'         => 'Telefono es requerido',
            'correo.required'           => 'Correo Electronico es requerido',
            'correo.email'              => 'Correo Electronico no es un correo valido',
            'password.required'         => 'Password es requerido',
        ];
    }
}
