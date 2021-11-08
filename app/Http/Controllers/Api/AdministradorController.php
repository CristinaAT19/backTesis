<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


use Exception;
use Illuminate\Http\Request;

use App\Models\Empleado;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FaltasCambioEstadoRequest;
use App\Http\Requests\CambiarTipoUsuarioRequest;
use App\Http\Requests\ResetearPasswordRequest;
use App\Http\Requests\InsertarEmpleadoRequest;
use App\Http\Requests\ActualizarEmpleadoRequest;
  
class AdministradorController extends Controller
{
    public function listarAdministrador()
    {
        $admin = DB::select("call pa_listar_administradores");
        // return response()->json($admin);
        return response()->json([
            'res' => 'true',
            // 'msg' => 'Listado Correcto :)',
            'administradores' => $admin
        ], 200);
    }

    public function resetPassword(ResetearPasswordRequest $request)
    {
        $submit = DB::select("select fu_reestablecer_password('$request->dni')");
        // return $submit;

        // return response()->json($submit);
        return response()->json([
            'res' => 'true',
            'msg' => $submit,
        ], 200);
    }

    public function cambiarTipoUsuario(CambiarTipoUsuarioRequest $request)
    {
        $admin = DB::select("select fu_cambiar_tipoUsuario('$request->dni','$request->tipoUsuario')");
        // return response()->json($admin);
        return response()->json([
            'res' => 'true',
            'msg' => $admin,
        ], 200);
    }
    public function insertarEmpleado(InsertarEmpleadoRequest $request)

    {
        DB::statement("call pa_insertar_empleado('$request->emp_nombre', '$request->emp_apellido', 
        '$request->emp_fechabaja', '$request->emp_fec_inicio_prueba', '$request->emp_Fec_fin_prueba', 
         $request->emp_TurnoId, $request->emp_AreaId, '$request->emp_dni', '$request->emp_carrera', 
        '$request->emp_email', '$request->emp_telefono', '$request->emp_link_cv', 
        $request->Emp_Id_Condicion_capacitacion_fk, '$request->emp_link_calificaciones',
        $request->Emp_Id_Convenio_fk, '$request->emp_link_convenio', '$request->emp_fechanac',
        $request->emp_dias_extra)");

        return response()->json([
            'respuesta' => 'true',
            'mensaje' => "insertado correctamente"
        ], 200);
    }
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
    public function tablas_administrador()
    {
        $asistencia = DB::select("call pa_listar_asistencia_diaria()");
        $sin_marcar = DB::select("call pa_listar_empleados_sin_marcar()");
        return response()->json([
            'Asistencia de empleados Diario' => $asistencia,
            'Empleados sin marcar diario' => $sin_marcar
        ], 200);
    }


    public function listarEmpleados()
    {
        $empleados = DB::select("call pa_listar_empleados");
        return response()->json([
            'respuesta' => 'true',
            'empleados' => $empleados
        ], 200); 
    }

    public function actualizarEmpleado(ActualizarEmpleadoRequest $request,$id)
    {
        
        $todas_empleados = DB::select("call pa_listar_empleados");
        $resultadoEncontrado = false;
        foreach ($todas_empleados as $empleado) {
            if((int)$id == (int)$empleado->Id )
            {
                $resultadoEncontrado = true;
            }
            if((string)$request->emp_dni == (string)$empleado->Dni)
            {
                if($resultadoEncontrado)
                {
                    continue;
                }else{
                    return response()->json([
                        "res"=>false,
                        "msg"=>"Ese DNI insertado ya existe, intente con otro."
                    ]);
                }
            }
        }
        if($resultadoEncontrado == false){
            return response()->json([
                "res"=>false,
                "msg"=>"No se encontro el registro. Vuelva a intentarlo"
            ]);
        }


        DB::statement("call pa_actualizar_empleados('$id','$request->emp_nombre',
        '$request->emp_apellido','$request->emp_fechabaja','$request->emp_fec_inicio_prueba',
        '$request->emp_Fec_fin_prueba',$request->emp_TurnoId,$request->emp_AreaId,
        '$request->emp_dni','$request->emp_carrera','$request->emp_email',
        '$request->emp_telefono','$request->emp_link_cv',$request->Emp_Id_Condicion_capacitacion_fk,
        '$request->emp_link_calificaciones',$request->Emp_Id_Convenio_fk,'$request->emp_link_convenio',
        '$request->emp_fechanac',$request->emp_dias_extra)"); 
        return response()->json([
            'respuesta' => 'true',
            'msg' =>'empleado actualizado correctamente'
        ], 200);   

    }

    // Manejo de faltas
    public function listar_faltas()
    {
        try {
            $todas_faltas = DB::select("call pa_listar_faltas()");
        } catch (Exception $e) {
            return response()->json([
                'res' => false,
                'msg' => $e->getMessage()
            ]);
        }
        if ($todas_faltas==null) {
            return response()->json([
                'res' => false,
                'msg' => 'No se encontraron registros'
            ], 200);
        }
        return response()->json([
            'data' => $todas_faltas
        ], 200);
    }

    public function actualizar_estado_faltas(FaltasCambioEstadoRequest $request, $id)
    {

        // 4 : Injustificada
        // 3 : Justificada
        // $request->cambio_estado;
        $todas_faltas = DB::select("call pa_listar_faltas()");
        $resultadoEncontrado = false;
        foreach ($todas_faltas as $falta) {
            if ((int)$id == (int)$falta->Id) {
                $resultadoEncontrado = true;
                break;
            }
        }
        if ($resultadoEncontrado == false) {
            return response()->json([
                "res" => false,
                "msg" => "No se encontro el registro. Vuelva a intentarlo"
            ]);
        }


        try {
            $boolRes = DB::statement('call pa_actualizar_estado_falta(?,?)', [$request->cambio_estado, (int)$id]);
            switch ($request->cambio_estado) {
                case 3:
                    $msg = "Justificado";
                    break;
                case 4:
                    $msg = "Injustificado";
                    break;
                default:
                    $msg = "ERROR";
                    break;
            }
            return response()->json([
                'res' => $boolRes,
                'msg' => "Se actualizo el estado correctamente al estado " . $msg

            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'res' => false,
                'msg' => $e->getMessage()
            ]);
        }

    }

}
