<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 2 : Usuario
        // 1 : Administrador
        $userAux = $request->user()->currentAccessToken();

        try {
            if ($userAux->tokenable->usu_Tipo_User_Id_fk == 2) {
                return response()->json(['error' => 'No tienes el rol para ejecutar esta accion'], 403);
            }
            if ($userAux->tokenable->usu_Tipo_User_Id_fk == 1) {
                return $next($request);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrio una error inesperado, intentelo mas tarde. Si el error persiste comuniquese con el equipo de desarollo'], 401);

        }
    }
}
