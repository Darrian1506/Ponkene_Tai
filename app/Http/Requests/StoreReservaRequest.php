<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservaRequest extends FormRequest
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
            'rutCliente' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'fono' =>'required',
            'cant_personas' => 'required',
            'descripcion' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'rutCliente.required' => 'Indique su Rut',
            'nombre.required' => 'Indique su nombre para el registro de su reservacion',
            'apellido.required' => 'Indique su apellido para el registro de su reservacion',
            'fono.required' => 'Indique su numero de contacto',
            'cant_personas.required' => 'Indique para cuantas personas es su reservacion',
            'descripcion.required' => 'Indique una Descripcion adicional a su reserva'
        ];
    }
}
