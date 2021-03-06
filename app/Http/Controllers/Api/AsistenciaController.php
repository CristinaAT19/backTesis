<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Http\Requests\MarcarAsistenciaRequest;
use Illuminate\Support\Facades\DB;
use App\Custom\Validaciones;
use Carbon\Carbon;
use Exception;

class AsistenciaController extends Controller
{
    public function marcarAsistencia(MarcarAsistenciaRequest $request)
    {
        // En la tarde no hay doble validacion en la tarde

        $validaciones = new Validaciones();
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $dispo = $validaciones->idDis();
        $ipv6 = $validaciones->getRealIP();
        $ipv4 = hexdec(substr($ipv6, 0, 2)) . "." . hexdec(substr($ipv6, 2, 2)) . "." . hexdec(substr($ipv6, 5, 2)) . "." . hexdec(substr($ipv6, 7, 2));
        $SO = $validaciones->getSO($request->useragent);
             
        // $SO = null ? " No se ecnontro el sistema operativo" : $SO;
        // $dispo=null ? "No encontro el dispositivo" : $dispo;
        // $ipv6 = null ? "No se encontro la ip" : $ipv6;
        // if($ipv6 == "" || $ipv6 == null || $ipv6 == " " || $ipv6 == "unknown"){
        //     $ipv6 = "No se encontro la ip";
        // }        
        // return response()->json([
        //     'respuesta' => 'true',
        //     'mensaje' => $SO.' - '.$dispo.' - '.$ipv6. ' - '.$ipv4.' - '.$ipv6,

        // ], 200);        

        $empleado = Empleado::where('Emp_Dni', $request->dni)->first();
        $asis_estado = DB::select("select fu_verificar_puntualidad('$request->dni','$hora') AS Respuesta");
        $atributo = "Respuesta";        
        // return response()->json(['res' => $asis_estado,'otra'=>$asis_estado[0],'nuevo'=>$asis_estado[0]->$atributo]);
        //  1 o 2 <-- Rango de fecha
        try{
            if ($asis_estado[0]->$atributo == "2" || $asis_estado[0]->$atributo == "1") {
                $detalle_asi = (int)$asis_estado[0]->$atributo;
                // Exsistencia de empleado
                if (!$empleado == null) {
                    $msg2 = DB::select("select fu_verificar_intentos('$fecha', '$hora', '$request->dni', '$request->plataforma', '$SO', '$dispo', '$request->useragent', '$request->usertime', '$ipv6', $detalle_asi) AS Respuesta");

                    // return response()->json([
                    //     'respuesta' => 'true',
                    //     'mensaje' => $msg2[0]->$atributo
                    // ], 200);
            
                    if($msg2[0]->$atributo == 1){
                        if ($detalle_asi == 1 ) {
                            $msg = "Gracias " . $empleado->Emp_Nombre . ", marcaste asistencia puntual ";
                        } else if($detalle_asi == 2){
                            $msg = "Gracias " . $empleado->Emp_Nombre . ", marcaste asistencia TARDE ";
                        }
                    }else if($msg2[0]->$atributo == 2){
                        $msg = "No puedes volver a marcar asistencia";
                    }else if($msg2[0]->$atributo == 3){
                        $msg = "Hoy es feriado, no puedes marcar asistencia";
                    }
                }
            } else {
                $msg = $asis_estado[0]->$atributo;
            }
        }catch(Exception $e){
            $msg = "Error en el servidor, no eres tu somos nostros";
            return response()->json([
                'respuesta' => 'true',
                'mensaje' => $msg
    
            ], 200);
        }
        return response()->json([
            'respuesta' => 'true',
            'mensaje' => $msg

        ], 200);
    }

    public function marcarFaltas($turno)
    {   
        date_default_timezone_set('America/Lima');
        $fechaActual = Carbon::now();
        $tActual = Carbon::createFromTime($fechaActual->hour, $fechaActual->minute);
        if ($turno == 1) {
            $tDestino = Carbon::createFromTime(13, 00);
        } else if ($turno == 2) {
            $tDestino = Carbon::createFromTime(19, 00);
        } else {
            return response()->json([

                "msg" => "No se permite el uso de este metodo"

            ]);
        }
        $tDiffInMinutes = $tActual->diffInMinutes($tDestino);
        if ($tDiffInMinutes <= 5) {
            DB::statement("call pa_insertar_faltas('$turno')");
            return response()->json([
                'msg' => true,
            ]);
        } else {
            return response()->json([
                'msg' => "No se permite el uso de este metodo : ".$tDiffInMinutes
            ]);
        }
    }
    public function limpiarFaltas()
    {
        DB::select("call pa_limpiar_tabla_faltas()");
        return response()->json([
            'msg' => true,
        ]);
    }
    public function limpiarAsistencias()
    {
        DB::select("call pa_limpiar_tabla_asistencia()");
        return response()->json([
            'msg' => true,
        ]);
    }
}
