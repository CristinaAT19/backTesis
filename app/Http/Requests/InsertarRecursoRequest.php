<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertarRecursoRequest extends FormRequest
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
            'recurso_categoria_id'=>'required|integer|between:1,5',
            'dominio_id'=>'required|integer',
            'rec_nombre'=>'required|string',
            'rec_enlace'=>'required|string',
        ];
    }
}
