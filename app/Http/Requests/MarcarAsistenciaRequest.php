<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcarAsistenciaRequest extends FormRequest
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
            "dni" => "required|integer|digits:8|gt:0|regex:/^[0-9]+$/",
            "plataforma" => "required",
            "useragent" => "required",
            "usertime" => "required"
        ];
    }
}
