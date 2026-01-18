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
            'ci'=> 'required|integer|unique:usuarios,ci|digits_between:6,12|bail',
            'nombre'=> 'required|string|max:255|regex:/^[\pL\s-]+$/u',
            'apellido'=> 'required|string|max:255|regex:/^[\pL\s-]+$/u',
            'password'=> 'required|string|min:8|confirmed',
            
            'fecha_nacimiento'=> 'nullable|date|before:today',
            'ubicacion'=> 'nullable|string|max:255',
            
        ];
    }
}
