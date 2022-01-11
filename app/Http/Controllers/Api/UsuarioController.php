<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CambiarPasswordRequest;

class UsuarioController extends Controller
{
    public function calendarioUsuario($dni)
    {
        // 2 : Usuario
        // 1 : Administrador
        $userAux = auth()->user()->currentAccessToken();
        if($dni != $userAux->name){
            if($userAux->tokenable->usu_Tipo_User_Id_fk != 1){
                return response()->json([
                    'res'=>false,
                    'error' => 'No tienes el rol para ver asistencia de otros empleados'
                ], 403);
            }        
        }

        // En caso de insertar DNI que no existe, debe salir mensaje de error
        $asistencias = DB::select("call pa_listar_asistencia_empleados_dni('$dni')");
        return response()->json([
            'respuesta' => 'true',
            'CalendarioAsistencia' => $asistencias
        ], 200);
    }
    public function dashboardUsuario($dni)
    {
        $asistencias_usuario = DB::select("call pa_contar_asistenciaDiaria_Dni('$dni')");
        return response()->json([
            'respuesta' => 'true',
            'DashboardAsistencia' => $asistencias_usuario
        ], 200);
    }
    public function cambiarPassword(CambiarPasswordRequest $request)
    {
        // Validacion por token        
        $userAux = $request->user()->currentAccessToken();
        $cambiarPassword = DB::select("select fu_cambiar_contraseña('$userAux->name','$request->oldPassword','$request->newPassword') AS mensaje");
        return response()->json([
            'respuesta' => 'true',
            'mensaje' => $cambiarPassword[0]->mensaje
        ], 200);
    }
}
