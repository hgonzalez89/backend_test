<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' =>'El nombre no puede ser mayor a :max caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email capturado no es válido.',
            'email.max' => 'El email no puede ser mayor a :max caracteres.',
            'email.unique' => 'El email capturado ya existe',
            'phone.required' => 'El telefono es obligatorio.',
            'password.required' => 'El password es obligatorio.',
            'password.min' => 'El password no puede ser mayor a :min caracteres.',
            'password.confirmed' => 'La confirmación del password no coincide.'
        ];
    }
    
}
