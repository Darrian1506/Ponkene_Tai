<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditEmpleadoRequest extends FormRequest
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
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'fono' => 'required|numeric|digits:9',
            'direccion' => 'required',
            'email' => 'required|email',
            'password' => '',
            'confirmPassword' => 'required_with:password|same:password'
        ];
    }

    public function messages(){
        return[
            'nombre.required' => 'Indique el nombre del empleado',
            'nombre.min' => 'El largo del nombre debe ser de al menos 3 caracteres',
            'apellido.required' => 'Indique el apellido del empleado',
            'apellido.min' => 'El largo del apellido debe ser de al menos 3 caracteres',
            'rut.between' => 'El rut del empleado debe tener este formato "11111111-1"',
            'fono.required' => 'Indique el fono del empleado',
            'fono.numeric' => 'El fono debe contener solo números',
            'fono.digits' => 'El fono debe contener 9 números',
            'direccion.required' => 'Indique la dirección del empleado',
            'email.required' => 'Indique el email del empleado',
            'email.unique' => 'El email ingresado ya existe',
            'email.email' => 'El email debe tener el formato "example@example.com"',
            'confirmPassword.required' => 'Confirme la contraseña del empleado',
            'confirmPassword.same' => 'La contraseña para confirmar no es correcta'
        ];
    }
}
