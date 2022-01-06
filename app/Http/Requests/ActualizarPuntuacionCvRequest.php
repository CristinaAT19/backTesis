<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarPuntuacionCvRequest extends FormRequest
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
            'Puntaje1'=>'required|integer|between:0,2',
            'Puntaje2'=>'required|integer|between:0,2',
            'Puntaje3'=>'required|integer|between:0,2',
            'Puntaje4'=>'required|integer|between:0,2',
            'Puntaje5'=>'required|integer|between:0,2',
            'Puntaje6'=>'required|integer|between:0,2',
            'Puntaje7'=>'required|integer|between:0,2',
            'Puntaje8'=>'required|integer|between:0,2',
        ];
    }
}
