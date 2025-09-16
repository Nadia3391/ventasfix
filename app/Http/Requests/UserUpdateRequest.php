<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('user')->id ?? $this->route('id');

        return [
            'rut'      => ['required','regex:/^\d{7,8}-[\dkK]$/', Rule::unique('users','rut')->ignore($id)],
            'nombre'   => ['required','string','max:100'],
            'apellido' => ['required','string','max:100'],
            'email'    => ['required','email','max:180','regex:/@ventasfix\.cl$/i', Rule::unique('users','email')->ignore($id)],
            'password' => ['nullable','string','min:8','confirmed'],
        ];
    }
}
