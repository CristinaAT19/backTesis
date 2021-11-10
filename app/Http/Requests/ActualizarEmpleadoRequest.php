<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarEmpleadoRequest extends FormRequest
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
            'emp_nombre'=>'required|string',
            'emp_apellido'=>'required|string',
            'emp_fechabaja'=>'required|date',
            'emp_fec_inicio_prueba'=>'required|date',
            'emp_Fec_fin_prueba'=>'required|date',
            'emp_TurnoId'=>'required|integer',
            'emp_AreaId'=>'required|integer',
            'emp_dni'=>'required|string',
            'emp_carrera'=>'required',
            'emp_email'=>'required|email',
            'emp_telefono'=>'required|string|max:20|min:5',
            'emp_link_cv'=>'required|url',
            'Emp_Id_Condicion_capacitacion_fk'=>'required', 
            'emp_link_calificaciones'=>'required|url',
            'Emp_Id_Convenio_fk'=>'required',
            'emp_link_convenio'=>'required|url', 
            'emp_fechanac'=>'required|date',
            'emp_dias_extra'=>'required'
        ];
    }
}
