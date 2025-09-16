<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'rut'      => ['required','regex:/^\d{7,8}-[\dkK]$/','unique:users,rut'],
            'nombre'   => ['required','string','max:100'],
            'apellido' => ['required','string','max:100'],
            'email'    => ['required','email','max:180','regex:/@ventasfix\.cl$/i','unique:users,email'],
            'password' => ['required','string','min:8','confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'rut.regex'   => 'Formato de RUT inválido (12345678-9).',
            'email.regex' => 'El correo debe ser del dominio @ventasfix.cl',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}

