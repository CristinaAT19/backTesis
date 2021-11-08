<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CambiarPasswordRequest;

class UsuarioController extends Controller
{
    public function calendarioUsuario($dni)
    {
        $asistencias = DB::select("call pa_listar_asistencia_empleados_dni('$dni')");
        return response()->json([
            'respuesta' => 'true',
            'Datos de asistencia' => $asistencias
        ], 200);
    }
    public function dashboardUsuario($dni)
    {
        $asistencias_usuario = DB::select("call pa_contar_asistenciaDiaria_Dni('$dni')");
        return response()->json([
            'respuesta' => 'true',
            'Datos de asistencia' => $asistencias_usuario
        ], 200);
    }
    public function cambiarPassword(CambiarPasswordRequest $request)
    {

        $cambiarPassword = DB::select("select fu_cambiar_contraseña('$request->dni','$request->oldPassword','$request->newPassword') AS mensaje");
        return response()->json([
            'respuesta' => 'true',
            'mensaje' => $cambiarPassword[0]->mensaje
        ], 200);
    }
}
