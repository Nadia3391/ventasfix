<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'rut_empresa'    => ['required','regex:/^\d{7,8}-[\dkK]$/','unique:clients,rut_empresa'],
            'rubro'          => ['required','string','max:120'],
            'razon_social'   => ['required','string','max:180'],
            'telefono'       => ['required','string','max:30'],
            'direccion'      => ['required','string','max:200'],
            'contacto_nombre'=> ['required','string','max:120'],
            'contacto_email' => ['required','email','max:180'],
        ];
    }
}
