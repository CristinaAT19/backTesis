<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class InsertarEmpleadoRequest extends FormRequest
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
        $date = Carbon::now()->subYears(18);
        return [

            'emp_nombre'=>'required|string|max:100|min:3',
            'emp_apellido'=>'required|string|max:100|min:3',
            'emp_fechabaja'=>'nullable|date',
            'emp_fec_inicio_prueba'=>'required|date',
            'emp_Fec_fin_prueba'=>'required|date',
            'emp_TurnoId'=>'required|integer',
            'emp_AreaId'=>'required|integer',
            "emp_dni" => "required|min:8|max:8|unique:empleados,Emp_dni",
            'emp_carrera'=>'required|string|max:100|min:3',
            'emp_email'=>'required|email|max:100|min:3',
            'emp_telefono'=>'required|string|max:20|min:5',
            'emp_link_cv'=>'nullable|url',
            'Emp_Id_Condicion_capacitacion_fk'=>'required|integer|min:0', 
            'emp_link_calificaciones'=>'nullable|url',
            'Emp_Id_Convenio_fk'=>'required|integer|min:0',
            'emp_link_convenio'=>'nullable|url', 
            "emp_fechanac" => 'required|date|before_or_equal:' . $date,            
        ];
    }
    public function attributes()
    {
        return [
            'emp_fechanac' => 'fecha de nacimiento'
        ];
    }
}
