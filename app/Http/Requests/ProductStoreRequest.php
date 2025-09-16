<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'sku'               => ['required','alpha_dash','max:80','unique:products,sku'],
            'nombre'            => ['required','string','max:150'],
            'descripcion_corta' => ['required','string','max:280'],
            'descripcion_larga' => ['nullable','string'],
            'imagen_url'        => ['required','url','max:255'],
            'precio_neto'       => ['required','integer','min:0'],
            'stock_actual'      => ['required','integer','min:0'],
            'stock_minimo'      => ['required','integer','min:0'],
            'stock_bajo'        => ['required','integer','min:0'],
            'stock_alto'        => ['required','integer','min:0','gte:stock_bajo'],
        ];
    }
}
