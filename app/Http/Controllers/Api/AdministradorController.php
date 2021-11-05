<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{

    public function insertarEmpleado(EmpleadoRequest $request)
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
    public function dashboard_ta()
    {
        $turno_t = DB::select("call pa_contar_asistenciaDiaria('2')");
        return response()->json([
            'Asistencia Turno Tarde' => $turno_t
        ], 200);
    }

    public function listarEmpleados()
    {
        $empleados = DB::select("call pa_listar_empleados");
        return response()->json([
            'respuesta' => 'true',
            'empleados' => $empleados
        ], 200);
    }
}
