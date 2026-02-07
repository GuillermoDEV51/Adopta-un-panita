<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefugiosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
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
