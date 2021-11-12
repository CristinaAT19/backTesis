<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Http\Requests\MarcarAsistenciaRequest;
use Illuminate\Support\Facades\DB;
use App\Custom\Validaciones;
use Carbon\Carbon;


class AsistenciaController extends Controller
{
    public function marcarAsistencia(MarcarAsistenciaRequest $request)
    {

        $validaciones = new Validaciones();
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $dispo = $validaciones->idDis();
        $ipv6 = $validaciones->getRealIP();
        $ipv4 = hexdec(substr($ipv6, 0, 2)) . "." . hexdec(substr($ipv6, 2, 2)) . "." . hexdec(substr($ipv6, 5, 2)) . "." . hexdec(substr($ipv6, 7, 2));
        $SO = $validaciones->getSO($request->useragent);

        $empleado = Empleado::where('Emp_Dni', $request->dni)->first();

        $asis_estado = DB::select("select fu_verificar_puntualidad('$request->dni','$hora') AS Respuesta");

        $atributo = "Respuesta";

        if ($asis_estado[0]->$atributo == "2" || $asis_estado[0]->$atributo == "1") {
            $detalle_asi = (int)$asis_estado[0]->$atributo;
            if (!$empleado == null) {
                $msg2 = DB::select("select fu_verificar_intentos('$fecha', '$hora', $empleado->Emp_Id, '$request->plataforma', '$SO', '$dispo', '$request->useragent', '$request->usertime', '$ipv6', $detalle_asi) AS respuesta");
                if ($msg2[0]->respuesta == 1) {
                    if ($detalle_asi == 1) {
                        $msg = "Gracias " . $empleado->Emp_Nombre . ", marcaste asistencia puntual ";
                    } else {
                        $msg = "Gracias " . $empleado->Emp_Nombre . ", marcaste asistencia tarde ";
                    }
                } else {
                    $msg = $empleado->Emp_Nombre . " ya marcaste asistencia.";
                }
            }
        } else {
            $msg = $asis_estado[0]->$atributo;
        }

        return response()->json([
            'respuesta' => 'true',
            'mensaje' => $msg

        ], 200);
    }

    public function marcarFaltas($turno)
    {
        $fechaActual = Carbon::now();
        $tActual = Carbon::createFromTime($fechaActual->hour, $fechaActual->minute);

        if ($turno == 1) {
            $tDestino = Carbon::createFromTime(18, 00);
        } else if ($turno == 2) {
            $tDestino = Carbon::createFromTime(24, 00);
        } else {
            return response()->json([
                "msg" => "No se permite el uso de este metod"
            ]);
        }
        if ($tActual->diffInMinutes($tDestino) <= 5) {
            if ($turno == 1) {
                DB::select("call pa_insertar_faltas('$turno')");
            }
            if ($turno == 2) {
                DB::select("call pa_insertar_faltas('$turno')");
            }
            return response()->json([
                'msg' => true,
            ]);
        } else {
            return response()->json([
                'msg' => "No se permite el uso de este metodo"
            ]);
        }
    }
}
