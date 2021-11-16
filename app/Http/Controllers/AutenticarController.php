<?php

namespace App\Http\Controllers;


use App\Http\Requests\AccesoUserRequest;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;
use Carbon\Carbon;

class AutenticarController extends Controller
{

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
        }
        $empleado = Empleado::where('Emp_Dni', $request->dni)->first();
        $user = User::where('usu_Id_Emp_fk', $empleado->Emp_Id)->first();
        //creacion del token
        $tokens = PersonalAccessToken::where('name', $request->dni)->get();
        foreach ($tokens as $token) {
            if ($token !== null) {
                $token->delete();
            }
        }
        $token = $user->createToken($request->dni)->plainTextToken;
        //mostrar el tipo de usuario en respuesta json
        $tipoUser = $user->usu_Tipo_User_Id_fk;
        if ($tipoUser == 1) {
            $msg = "Administrador";
        } else {
            $msg = "Usuario";
        }
        return response()->json([
            'res' => 'true',
            'token' => $token,
            'TipoUsuario' => $msg,
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
    /**************************/
    //Eliminar Token por inactividad
    /**************************/
    public function eliminarTokenInactividad()
    {
        $tokens = PersonalAccessToken::all();
        foreach ($tokens as $token) {
            if (!empty($token->last_used_at) && Carbon::parse($token->last_used_at)->addMinutes(30)->isBefore(Carbon::now())) {
                $token->delete();
            }
        }
    }
}
