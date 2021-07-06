<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditInsumoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|unique',
            'categoria' =>'required',
            'precio' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return[
            'nombre.required' => 'Indique el nombre del insumo ',
            'nombre.unique' => 'El nombre del insumo ya existe',
            'categoria' => 'Indique la categoria del insumo',
            'precio.required' => 'Indique el precio del insumo'
        ];
    }
}
