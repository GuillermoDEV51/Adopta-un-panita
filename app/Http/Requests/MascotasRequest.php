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
            'tipo' => 'required|string|max:100',
            'raza' => 'nullable|string|max:100',
            'sexo' => 'required|in:Macho,Hembra',
            'peso' => 'nullable|numeric|min:0',
            'descripcion' => 'nullable|string',
            'foto' => 'nullable|image|max:2048', // Máximo 2MB

        ];
    }
}
