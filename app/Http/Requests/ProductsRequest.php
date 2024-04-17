<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:catalog_products',
            'description' => 'required|max:255',
            'height' => 'required|numeric|max:255',
            'length' => 'required|numeric|max:255',
            'width' => 'required|numeric|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe capturar el nombre.',
            'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
            'name.unique' => 'El nombre ya se encuentra registrado.',
            'description.required' => 'Debe capturar la descripcion.',
            'description.max' => 'La descripcion no puede ser mayor a :max caracteres.',
            'height.required' => 'Debe capturar la altura.',
            'height.max' => 'La altura no puede ser mayor a :max caracteres.',
            'height.numeric' => 'La altura debe ser un valor numerico.',
            'length.required' => 'Debe capturar la logitud.',
            'length.max' => 'La logitud no puede ser mayor a :max caracteres.',
            'length.numeric' => 'La logitud debe ser un valor numerico.',
            'width.required' => 'Debe capturar el ancho.',
            'width.max' => 'El ancho no puede ser mayor a :max caracteres.',
            'width.numeric' => 'El ancho debe ser un valor numerico.'
        ];
    }
}
