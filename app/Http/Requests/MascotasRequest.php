<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotasRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'id_especies' => 'required|integer|exists:especies,id',
            'raza' => 'nullable|string|max:100',
            'genero' => 'required|in:Macho,Hembra',
            'peso' => 'nullable|numeric|min:0',
            'descripcion' => 'nullable|string',
            'foto' => 'nullable|image|max:2048', // Máximo 2MB
            'vacunado' => 'required|boolean',
            'esterilizado' => 'required|boolean',
            'documentacion' => 'nullable|file|max:2048',
            'ubicacion' => 'required|string|max:100',
            "tamano" => 'required|in:Pequeño,Mediano,Grande',


        ];
    }
}
