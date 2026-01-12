<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            'ci'=> 'required|integer|unique:usuarios,ci',
            'nombre'=> 'required|string|max:255',
            'apellido'=> 'required|string|max:255',
            'password'=> 'required|string|min:8|confirmed',
            'password_confirmation'=> 'required|string|min:8|same:password',
            'fecha_nacimiento'=> 'nullable|date',
            'ubicacion'=> 'nullable|string|max:255',
            
        ];
    }
}
