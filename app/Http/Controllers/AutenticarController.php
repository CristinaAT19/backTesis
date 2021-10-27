<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroUserRequest;
use App\Http\Requests\AccesoUserRequest;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{
    public function registro(RegistroUserRequest $request)
    {
        $user = new User();
        $user->usu_Id_Emp_fk = $request->usu_Id_Emp_fk;
        $user->usu_Password = sha1($request->usu_Password);
        $user->usu_Tipo_User_Id_fk = $request->usu_Tipo_User_Id_fk;
        $user->save();

        return response()->json([
            'res' => 'true',
            'msg' => 'Usuario registrado :)'
        ], 200);
    }

    public function acceso(AccesoUserRequest $request)
    {
        $empleado = Empleado::where('Emp_Dni', $request->dni)->first();
        // $usuario = DB::select("call pa_verificar_login('$request->dni', '$request->password')");

        $user = User::where('usu_Id_Emp_fk', $empleado->Emp_Id)->first();

        if ($user == null) {
            throw ValidationException::withMessages([
                'smg' => ['El correo o la contraseña es incorrecto'],
            ]);
        }

        $token = $user->createToken($request->dni)->plainTextToken;
        return response()->json([
            'res' => 'true',
            'token' => $token,
            'usuario' => $user
        ], 200);
    }

    public function cerrarSesion(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'res' => 'true',
            'token' => 'Token eliminado correctamente'
        ], 200);
    }
}
