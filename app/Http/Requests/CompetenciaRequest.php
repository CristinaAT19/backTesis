<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetenciaRequest extends FormRequest
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
            'perfil'=>'required|integer|min:0',
            'departamento'=>'required|integer|min:0',
            'area'=>'required|integer|min:0',
            'subarea'=>'required|integer|min:0',
            'recurso'=>'nullable|url',
        ];
    }
}
