<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FaltasCambioEstadoRequest;

class AdministradorController extends Controller
{
    public function dashboard_ma()
    {
        $turno_m = DB::select("call pa_contar_asistenciaDiaria('1')");
        return response()->json([
            'Asistencia Turno Mañana' => $turno_m
        ], 200);
    }
    public function dashboard_ta()
    {
        $turno_t = DB::select("call pa_contar_asistenciaDiaria('2')");
        return response()->json([
            'Asistencia Turno Tarde' => $turno_t
        ], 200);
    }
    public function tablas_administrador($turno)
    {
        $tabla_asis = DB::select("call pa_listar_asistencia_diaria()");
        $tabla_sin_marcar = DB::select("call pa_listar_empleados_sin_marcar('$turno')");
        return response()->json([
            'Asistencia de Empleados' => $tabla_asis,
            'Empleados sin marcar' => $tabla_sin_marcar
        ], 200);
    }

    // Manejo de faltas
    public function listar_faltas(){
        try{
            $todas_faltas = DB::select("call pa_listar_faltas()");
        }catch(Exception $e){
            return response()->json([
                'res'=>false,
                'msg'=>$e->getMessage()
            ]);
        }
        if(!isset($todas_faltas)){
            return response()->json([
                'res'=>false,
                'msg'=>'No se encontraron registros'
            ],200);
        }
        return response()->json([
            'data'=>$todas_faltas
        ],200);        
    }
    
    public function actualizar_estado_faltas(Request $request,$id){        

        // 4 : Injustificada
        // 3 : Justificada
        // $request->cambio_estado;
        
        if($request->cambio_estado !=3 && $request->cambio_estado !=4)
        {
            return response()->json([
                'res'=>false,
                'msg'=>"Valor no permitido intente con :  4: Falta injustificada ,3 : Falta justificada "
            ]);
        }
        try{
            $boolRes = DB::statement('call pa_actualizar_estado_falta(?,?)', [$request->cambio_estado,(int)$id]);
            $msg = $request->cambio_estado==3 ? 'Justificado':'Injustificado';
            return response()->json([
                'res'=>$boolRes,
                'msg'=>"Se actualizo el estado correctamente al estado ".$msg
                
            ],200);   
        }catch(Exception $e){
            return response()->json([
                'res'=>false,
                'msg'=>$e->getMessage()
            ]);   

        }
    }
}
