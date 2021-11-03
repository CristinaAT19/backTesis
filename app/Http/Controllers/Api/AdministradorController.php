<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function insertarUsuario(EmpleadoRequest $request)
    {
         DB::statement("call pa_insertar_empleado('$request->emp_nombre', '$request->emp_apellido', 
        '$request->emp_fechabaja', '$request->emp_fec_inicio_prueba', '$request->emp_Fec_fin_prueba', 
         $request->emp_TurnoId, $request->emp_AreaId, '$request->emp_dni', '$request->emp_carrera', 
        '$request->emp_email', '$request->emp_telefono', '$request->emp_link_cv', 
        $request->Emp_Id_Condicion_capacitacion_fk, '$request->emp_link_calificaciones',
        $request->Emp_Id_Convenio_fk, '$request->emp_link_convenio', '$request->emp_fechanac',
        $request->emp_dias_extra)"); 
        
        return response()->json([
            'respuesta' => 'true',
            'mensaje' => "insertado correctamente"
        ], 200);
        
        /*emp_nombre,	
        emp_apellido,
        emp_fechabaja,		
        emp_fec_inicio_prueba,
        emp_Fec_fin_prueba,
        emp_Turno,
        emp_AreaId,
        emp_dni,
        emp_carrera,
        emp_email,
        emp_telefono,
        emp_link_cv,									
        Emp_Id_Condicion_capacitacion_fk,	
        emp_link_calificaciones,
        Emp_Id_Convenio_fk,
        emp_link_convenio,
        emp_fechanac,
        Emp_UnidadId,									
        emp_dias_extra*/
    }
}
