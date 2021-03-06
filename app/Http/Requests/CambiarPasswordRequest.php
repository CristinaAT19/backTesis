<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambiarPasswordRequest extends FormRequest
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
            "oldPassword" => "required|max:20|min:4",
            "newPassword" => "required|max:20|min:4"
        ];
    }
}
