<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User
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
        $user = DB::select("call pa_listar_detallesdeempleado_dni('$request->dni')");
        if($user[0]->Tipo_Usuario == 'Administrador'){
            return response()->json(['error' => 'No tiene permisos para acceder a esta sección'], 401);
        }   
        if($user[0]->Tipo_Usuario == 'Usuario'){
            return response()->json(['error' => 'Usuario'], 401);
        }   
        return $next($request);
    }
}
