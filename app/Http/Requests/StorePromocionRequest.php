<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;

class StorePromocionRequest extends FormRequest
{

    public function __construct()
    {
        
    }
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
            'nombre' => 'required|unique:promocion',
            'precio' => 'required|numeric',
            'hora_ini' => 'required',
            'hora_ter' => 'required|gte:hora_ini',
            'fecha_ini' => 'required',
            'fecha_ter' => 'required'

        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Indique el nombre de la promocion ',
            'nombre.unique' => 'El nombre ingresado ya está en uso',
            'precio.required' => 'Indique el precio de la promocion',
            'precio.number' => 'El precio debe ser un número',
            'hora_ini.required' => 'Indique la hora de inicio de la promocion',
            'hora_ter.required' => 'Indique la hora de termino de la promocion',
            'fecha_ini.required' => 'Indique la fecha de inicio de la promocion ',
            'fecha_ter.required' => 'Indique la fecha de termino de la promocion '
        ];
    }
}
