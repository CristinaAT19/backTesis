<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdministradorRequest;
use App\Http\Requests\CambiarTipoUsuarioRequest;
use App\Http\Requests\ResetearPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function listarAdministrador()
    {
        $admin = DB::select("call pa_listar_administradores");
        // return response()->json($admin);
        return response()->json([
            'res' => true."dentro",
            // 'msg' => 'Listado Correcto :)',
            'administradores' => $admin

        ], 200);
    }

    public function resetPassword(ResetearPasswordRequest $request)
    {
        $submit = DB::select("select fu_reestablecer_password('$request->dni')");
        // return $submit;

        // return response()->json($submit);
        return response()->json([
            'res' => 'true',
            'msg' => $submit,
        ], 200);
    }

    public function cambiarTipoUsuario(CambiarTipoUsuarioRequest $request)
    {
        $admin = DB::select("select fu_cambiar_tipoUsuario('$request->dni','$request->tipoUsuario')");
        // return response()->json($admin);
        return response()->json([
            'res' => 'true',
            'msg' => $admin,
        ], 200);
    }


}
