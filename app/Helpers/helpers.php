<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

if (! function_exists('validateParamsIdInUrl')) {
    function validateParamsIdInUrl($id)
    {
        $array = [
            'id' => $id
        ];

        $fieldCreate = [
            'id' => 'required|integer|min:0',
        ];
        $validations = Validator::make($array, $fieldCreate);
        if ($validations->fails()) {
            return $validations->errors();
        }
        return null;
    }
}
