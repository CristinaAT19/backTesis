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
use Illuminate\Support\Facades\Auth;

class AutenticarController extends Controller
{

    /**************************/
    //Inicio de Sesion
    /**************************/
    public function acceso(AccesoUserRequest $request)
    {
        $validacion_login = DB::select("SELECT fu_verificar_login('$request->dni', '$request->password') AS validacion");
        $atributo = "validacion";
        $user = null;
        if ($validacion_login[0]->$atributo == 1) {

            throw ValidationException::withMessages([
                'smg' => ['El dni o la contraseña es incorrecto'],
            ]);
        }        
        $empleado = Empleado::where('Emp_Dni', $request->dni)->first();
        $user = User::where('usu_Id_Emp_fk', $empleado->Emp_Id)->first();
        // Auth::login($user);
        // return 
        //creacion del token
        $tokens = PersonalAccessToken::where('name', $request->dni)->get();
        foreach ($tokens as $token) {
            if ($token !== null) {
                $token->delete();
            }
        }
        // Coloca ID debido a que el campo que agarra por defecto no funciona
        $user['id'] = $user['Id'];
        $token = $user->createToken($request->dni)->plainTextToken;
        //mostrar el tipo de usuario en respuesta json
        $tipoUser = $user->usu_Tipo_User_Id_fk;
        if ($tipoUser == 7) {
            $tipoUser = 2;
            $msg = "Usuario";
        } else {
            $tipoUser = 1;
            $msg = "Administrador";
        }
        // Obtener detalles del usuario
        $usuario = DB::select("call pa_listar_detallesdeempleado_dni('$request->dni')");
        return response()->json([
            'res' => 'true',
            'token' => $token,
            'TipoUsuario' => $msg,
            'id_TipoUsuario' => $tipoUser,
            'dni' => $usuario[0]->Dni,
            'nombre' => $usuario[0]->Nombre,
            'apellido' => $usuario[0]->Apellido,
            'perfil' => $usuario[0]->Perfil,
            'unidad' => $usuario[0]->Unidad,
            'turno' => $usuario[0]->Turno,
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
    /**************************/
    //Cerrar sesion por inactividad
    /**************************/
    public function verificarToken($tokenId)
    {
        $token = PersonalAccessToken::where('id', $tokenId)->get();
        if ($token[0]->id !== null) {
            return response()->json([
                'res' => true,
                'tokenId' => $token[0]->id,
            ], 200);
        }
    }

    public function identificarPorToken(Request $request){
        $userAux = auth()->user()->currentAccessToken();
        $usuario = DB::select("call pa_listar_detallesdeempleado_dni('$userAux->name')");
        $token = $request->bearerToken();
        $tipoUser = $userAux->usu_Tipo_User_Id_fk;
        if ($tipoUser == 7) {
            $tipoUser = 2;
            $msg = "Usuario";
        } else {
            $tipoUser = 1;
            $msg = "Administrador";
        }

        return response()->json([
            'res' => 'true',
            'token' => $token,
            'TipoUsuario' => $msg,
            'id_TipoUsuario' => $tipoUser,
            'dni' => $usuario[0]->Dni,
            'nombre' => $usuario[0]->Nombre,
            'apellido' => $usuario[0]->Apellido,
            'perfil' => $usuario[0]->Perfil,
            'unidad' => $usuario[0]->Unidad,
            'turno' => $usuario[0]->Turno,
        ], 200);
    }
}
