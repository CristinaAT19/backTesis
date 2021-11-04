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
        $validacion_login = DB::select("SELECT fu_verificar_login('$request->dni', '$request->password') AS validacion");
        $atributo = "validacion";
        if ($validacion_login[0]->$atributo == 1) {
            throw ValidationException::withMessages([
                'smg' => ['El dni o la contraseña es incorrecto'],
            ]);
        } else {
            $empleado = Empleado::where('Emp_Dni', $request->dni)->first();
            $user = User::where('usu_Id_Emp_fk', $empleado->Emp_Id)->first();
            //creacion del token
            $token = $user->createToken($request->dni)->plainTextToken;
            //mostrar el tipo de usuario en respuesta json
            $tipoUser = $user->usu_Tipo_User_Id_fk;
            if ($tipoUser == 1) {
                $msg = "Administrador";
            } else {
                $msg = "Usuario";
            }
        }

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
