<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginEmpleadoRequest extends FormRequest
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
            'rut' => 'required|between:9,10',
            'password' => 'required'
        ];
    }

    public function messages(){
        return[
            'rut.required' => 'Indique el rut del empleado',
            'rut.between' => 'El rut del empleado debe ser "11111111-1"',
            'password.required' => 'Indique la password del empleado'
        ];
    }
}
