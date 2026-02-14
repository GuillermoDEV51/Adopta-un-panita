<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistroRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ci'=> 'integer|unique:usuarios,ci|digits_between:6,8|bail',
            'nombre'=> 'required|string|max:20|regex:/^[\pL\s-]+$/u',
            'apellido'=> 'required|string|max:20|regex:/^[\pL\s-]+$/u',
            'password'=> 'required|string|min:8|confirmed|max:20',
            'telefono' => 'required|digits_between:7,11',
            'id_rol'=> 'nullable|exists:roles,id',
            'fecha_nacimiento'=> 'nullable|date|before:today',
            'ubicacion'=> 'nullable|string|max:255',

            
            
        ];
    }

    public function messages()
    {
        return [
            'ci'
        ];  
    }
}
