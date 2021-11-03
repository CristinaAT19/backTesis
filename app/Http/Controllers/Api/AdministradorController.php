<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
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
    public function tablas_administrador($turno)
    {
        $tabla_asis = DB::select("call pa_listar_asistencia_diaria()");
        $tabla_sin_marcar = DB::select("call pa_listar_empleados_sin_marcar('$turno')");
        return response()->json([
            'Asistencia de Empleados' => $tabla_asis,
            'Empleados sin marcar' => $tabla_sin_marcar
        ], 200);
    }
}
