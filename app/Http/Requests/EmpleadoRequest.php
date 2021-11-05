<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            "emp_nombre"=> "required",	
            "emp_apellido"=> "required",
            "emp_fechabaja"=> "required",
            "emp_fec_inicio_prueba"=> "required",
            "emp_Fec_fin_prueba"=> "required",	
            "emp_TurnoId"=> "required",
            "emp_AreaId"=> "required",
            "emp_dni" => "required|min:8|max:8|unique:empleados,Emp_dni",
            "emp_carrera"=> "required",
            "emp_email"=> "required",
            "emp_telefono"=> "required",
            "emp_link_cv"=> "required",
            "Emp_Id_Condicion_capacitacion_fk"=> "required",
            "emp_link_calificaciones"=> "required",
            "Emp_Id_Convenio_fk"=> "required",
            "emp_link_convenio"=> "required",
            "emp_fechanac"=> "required",
            "emp_dias_extra"=> "required"
        ];
    }
}
