<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsertarEmpleadoRequest;
use App\Http\Requests\ActualizarEmpleadoRequest;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{

    public function insertarEmpleado(InsertarEmpleadoRequest $request)
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
        
    }
    public function dashboard_ma()
    {
        $turno_m = DB::select("call pa_contar_asistenciaDiaria('1')");
        return response()->json([
            'Asistencia Turno Mañana' => $turno_m
        ], 200);
    }

    public function listarEmpleados()
    {
        $empleados=DB::select("call pa_listar_empleados"); 
        return response()->json([
            'respuesta' => 'true',
            'empleados' => $empleados
        ], 200); 
    }

    public function actualizarEmpleado(ActualizarEmpleadoRequest $request,$id)
    {
        
        $todas_empleados = DB::select("call pa_listar_empleados");
        $resultadoEncontrado = false;
        foreach ($todas_empleados as $empleado) {
            if((int)$id == (int)$empleado->Id )
            {
                $resultadoEncontrado = true;
            }
            if((string)$request->emp_dni == (string)$empleado->Dni)
            {
                if($resultadoEncontrado)
                {
                    continue;
                }else{
                    return response()->json([
                        "res"=>false,
                        "msg"=>"Ese DNI insertado ya existe, intente con otro."
                    ]);
                }
            }
        }
        if($resultadoEncontrado == false){
            return response()->json([
                "res"=>false,
                "msg"=>"No se encontro el registro. Vuelva a intentarlo"
            ]);
        }


        DB::statement("call pa_actualizar_empleados('$id','$request->emp_nombre',
        '$request->emp_apellido','$request->emp_fechabaja','$request->emp_fec_inicio_prueba',
        '$request->emp_Fec_fin_prueba',$request->emp_TurnoId,$request->emp_AreaId,
        '$request->emp_dni','$request->emp_carrera','$request->emp_email',
        '$request->emp_telefono','$request->emp_link_cv',$request->Emp_Id_Condicion_capacitacion_fk,
        '$request->emp_link_calificaciones',$request->Emp_Id_Convenio_fk,'$request->emp_link_convenio',
        '$request->emp_fechanac',$request->emp_dias_extra)"); 
        return response()->json([
            'respuesta' => 'true',
            'msg' =>'empleado actualizado correctamente'
        ], 200);   
    }
}
