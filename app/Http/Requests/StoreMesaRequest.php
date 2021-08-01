<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMesaRequest extends FormRequest
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
            'cod_mesa' => 'required|unique:mesa',
            'ubicacion' => 'required',
            'capacidad'=> 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'cod_mesa.required' => 'Indique el número de la mesa.',
            'cod_mesa.unique' => 'El número de mesa ya existe.',
            'ubicacion.required' => 'Indique la ubicación de la mesa.',
            'capacidad.required'=> 'Indique la capacidad de la mesa',
            'capacidad.min' => 'El mínimo de la capacidad es 1'
        ];
    }
}
