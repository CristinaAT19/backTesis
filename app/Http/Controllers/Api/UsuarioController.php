<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function calendarioUsuario($dni)
    {
        $asistencias = DB::select("call pa_listar_asistencia_empleados_dni('$dni')");
        return response()->json([
            'Datos de asistencia' => $asistencias
        ], 200);
    }

    public function dashboardUsuario($dni)
    {
        $asistencias_usuario = DB::select("call pa_contar_asistenciaDiaria_Dni('$dni')");
        return response()->json([
            'Datos de asistencia' => $asistencias_usuario
        ], 200);
    }
}
