<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'id_especies' => 'required|integer|exists:especies,id',
            'raza' => 'nullable|string|max:100',
            'genero' => 'required|in:Macho,Hembra',
            'peso' => 'nullable|numeric|min:0',
            'descripcion' => 'nullable|string|max:500',
            'id_usuario' => 'integer|exists:usuarios,id',
            

            'foto' => 'nullable|image|max:2048',
            'vacunado' => 'required|boolean',
            'esterilizado' => 'required|boolean',
            'documentacion' => 'nullable|array',
            'documentacion.*' => 'file|max:2048',

            'ubicacion' => 'string|max:100',
            'tamano' => 'required|in:Pequeño,Mediano,Grande',
        ];
    }

    public function messages(): array
    {
        return [
            'telefono.required' => 'El número telefónico es obligatorio.',
            'telefono.regex' => 'El teléfono solo puede contener números y símbolos válidos.',
            'telefono.min' => 'El teléfono es demasiado corto.',
            'telefono.max' => 'El teléfono es demasiado largo.',
        ];
    }
}
