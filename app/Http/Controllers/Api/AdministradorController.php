<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FaltasCambioEstadoRequest;
use App\Http\Requests\CambiarTipoUsuarioRequest;
use App\Http\Requests\ResetearPasswordRequest;
use App\Http\Requests\InsertarEmpleadoRequest;
use App\Http\Requests\ActualizarEmpleadoRequest;
use App\Http\Requests\TipoUsuarioRequest;

class AdministradorController extends Controller
{
    public function listarAdministrador()
    {
        $admin = DB::select("call pa_listar_administradores");
        // return response()->json($admin);
        return response()->json([
            'res' => true,
            // 'msg' => 'Listado Correcto :)',
            'administradores' => $admin
        ], 200);
    }

    public function resetPassword(ResetearPasswordRequest $request)
    {
        $submit = DB::select("select fu_reestablecer_password('$request->dni') AS restablecer");
        // return $submit;

        // return response()->json($submit);
        return response()->json([
            'res' => true,
            'msg' => $submit,
        ], 200);
    }

    public function cambiarTipoUsuario(CambiarTipoUsuarioRequest $request)
    {
        $admin = DB::select("select fu_cambiar_tipoUsuario('$request->dni','$request->tipoUsuario') AS cambiar");
        // return response()->json($admin);
        return response()->json([
            'res' => true,
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
            'respuesta' => true,
            'mensaje' => "insertado correctamente"
        ], 200);
    }
    public function dashboard_ma()
    {
        $turno_m = DB::select("call pa_contar_asistenciaDiaria('1')");

        return response()->json([
            // 'respuesta' => 'true',
            'puntualidad' => $turno_m[0]->Estado,
            'v_puntualidad' => $turno_m[0]->Cantidad,
            'tardanza' => $turno_m[1]->Estado,
            'v_tardanza' => $turno_m[1]->Cantidad,
            'faltas_in' => $turno_m[2]->Estado,
            'v_faltas_in' => $turno_m[2]->Cantidad,
            'faltas_jus' => $turno_m[3]->Estado,
            'v_faltas_jus' => $turno_m[3]->Cantidad,
            'sin_marcar' => $turno_m[4]->Estado,
            'v_sin_marcar' => $turno_m[4]->Cantidad
        ], 200);
    }
    public function dashboard_ta()
    {
        $turno_t = DB::select("call pa_contar_asistenciaDiaria('2')");
        return response()->json([
            // 'respuesta' => 'true',
            'puntualidad' => $turno_t[0]->Estado,
            'v_puntualidad' => $turno_t[0]->Cantidad,
            'tardanza' => $turno_t[1]->Estado,
            'v_tardanza' => $turno_t[1]->Cantidad,
            'faltas_in' => $turno_t[2]->Estado,
            'v_faltas_in' => $turno_t[2]->Cantidad,
            'faltas_jus' => $turno_t[3]->Estado,
            'v_faltas_jus' => $turno_t[3]->Cantidad,
            'sin_marcar' => $turno_t[4]->Estado,
            'v_sin_marcar' => $turno_t[4]->Cantidad
        ], 200);
    }
    public function tablas_administrador()
    {
        $asistencia = DB::select("call pa_listar_asistencia_diaria()");
        $sin_marcar = DB::select("call pa_listar_empleados_sin_marcar()");
        return response()->json([
            'respuesta' => true,
            'AsistenciaEmpleadosDiario' => $asistencia,
            'EmpleadosSinMarcarDiario' => $sin_marcar
        ], 200);
    }


    public function listarEmpleados()
    {
        $empleados = DB::select("call pa_listar_empleados");
        return response()->json([
            'respuesta' => true,
            'empleados' => $empleados
        ], 200);
    }

    public function actualizarEmpleado(ActualizarEmpleadoRequest $request, $id)
    {

        $todas_empleados = DB::select("call pa_listar_empleados");
        $resultadoEncontrado = false;
        foreach ($todas_empleados as $empleado) {
            if ((int)$id == (int)$empleado->Id) {
                $resultadoEncontrado = true;
            }
            if ((string)$request->emp_dni == (string)$empleado->Dni) {
                if ($resultadoEncontrado) {
                    continue;
                } else {
                    return response()->json([
                        "res" => false,
                        "msg" => "Ese DNI insertado ya existe, intente con otro."
                    ]);
                }
            }
        }
        if ($resultadoEncontrado == false) {
            return response()->json([
                "res" => false,
                "msg" => "No se encontro el registro. Vuelva a intentarlo"
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
            'respuesta' => true,
            'msg' => 'empleado actualizado correctamente'
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
        if ($todas_faltas == null) {
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

    public function mostrarTipoUsuario(TipoUsuarioRequest $request)
    {
        $usuario = DB::select("call pa_listar_detallesdeempleado_dni('$request->dni')");
        if($usuario!=null){
            return response()->json([
                'res' => true,
                // 'msg' => 'Listado Correcto :)',
                'tipoUsuario' => 'El dni corresponde a un '.$usuario[0]->Tipo_Usuario,
                'dni'=>$usuario[0]->Dni,
                'nombre'=>$usuario[0]->Nombre,
                'apellido'=>$usuario[0]->Apellido,
                'perfil'=>$usuario[0]->Perfil,
                'unidad'=>$usuario[0]->Unidad,
                'turno'=>$usuario[0]->Turno,
                'id'=>$usuario[0]->Id,
                'soloTipoUsuario'=>$usuario[0]->Tipo_Usuario,

            ], 200);
        } else {
            return response()->json([
                'res' => true,
                // 'msg' => 'Listado Correcto :)',
                'tipoUsuario' => 'El dni ingresado no existe'
            ], 200);
        }  
    }
}
