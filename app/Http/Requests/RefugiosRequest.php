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
            'direccion_refugio' => 'required|string|max:255',
            'telefono_refugio' => 'required|string|max:20',
            'email_refugio' => 'required|email|max:255',
        ];
    }
}
