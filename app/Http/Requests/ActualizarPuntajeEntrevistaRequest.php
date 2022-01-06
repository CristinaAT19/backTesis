<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarPuntajeEntrevistaRequest extends FormRequest
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
            'Puntaje1'=>'required|integer',
            'Puntaje2'=>'required|integer',
            'Puntaje3'=>'required|integer',
            'Puntaje4'=>'required|integer',
            'Puntaje5'=>'required|integer',
            'Puntaje6'=>'required|integer',
            'Puntaje7'=>'required|integer',
            'Puntaje8'=>'required|integer',
        ];
    }
}
