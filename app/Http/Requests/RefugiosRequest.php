<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefugiosRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre_refugio' => 'required|string|max:255',
            'responsable_nombre' => 'required|string|max:255|unique:usuarios,nombre',
            'cedula_responsable' => 'required|numeric|unique:usuarios,ci',
            'direccion_refugio' => 'required|string|max:255',
            'telefono_refugio' => 'required|string|max:20',
            'email_refugio' => 'required|email|max:255|unique:refugios,email',
            'password_refugio' => 'required|string|min:6',
            'redes_sociales' => 'nullable|string|max:255',
            'descripcion_refugio' => 'nullable|string|max:1000',
            'foto_portada' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
