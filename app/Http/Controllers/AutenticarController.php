<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroUserRequest;
use App\Http\Requests\AccesoUserRequest;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\AdministradorController;


class AutenticarController extends Controller
{
    public function registro(RegistroUserRequest $request)
    {
        $user = new User();
        $user->usu_Id_Emp_fk = $request->id;
        $user->usu_Password = bcrypt($request->password);
        $user->usu_Tipo_User_Id_fk = $request->tipoUsuario;
        $user->save();

        return response()->json([
            'res' => 'true',
            'msg' => 'Usuario registrado :)'
        ], 200);
    }
    /**************************/
    //Inicio de Sesion
    /**************************/
    public function acceso(AccesoUserRequest $request)
    {
        $empleado = Empleado::where('Emp_Dni', $request->dni)->first();
        if ($empleado == null) {
            throw ValidationException::withMessages([
                'smg' => ['El dni es incorrecto'],
            ]);
        }

        $user = User::where('usu_Id_Emp_fk', $empleado->Emp_Id)->first();
        if (!$user || !Hash::check($request->password, $user->usu_Password)) {
            throw ValidationException::withMessages([
                'smg' => ['La contraseña es incorrecto'],
            ]);
        }

        //creacion del token
        $token = $user->createToken($request->dni)->plainTextToken;

        //mostrar el tipo de usuario en respuesta json
        $tipoUser = $user->usu_Tipo_User_Id_fk;
        if ($tipoUser == 1) {
            $msg = "Administrador";
        } else {
            $msg = "Usuario";
        }
        // $asis_m = DB::select("call pa_listar_asistencia_empleados_dni('$empleado->Emp_Dni')");
        // $asis_empleado = DB::select("call pa_listar_asistencia_empleados_dni('$empleado->Emp_Dni')");

        return response()->json([
            'res' => 'true',
            'token' => $token,
            'tipo de Usuario' => $msg,
            'id_TipoUsuario' => $tipoUser
        ], 200);
    }
    /**************************/
    //Cerrar Sesion
    /**************************/
    public function cerrarSesion(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'res' => 'true',
            'token' => 'Token eliminado correctamente'
        ], 200);
    }
}
