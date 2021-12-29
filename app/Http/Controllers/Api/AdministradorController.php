<?php


namespace App\Http\Controllers\Api;

use App\Models\Empleado;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FaltasCambioEstadoRequest;
use App\Http\Requests\CambiarTipoUsuarioRequest;
use App\Http\Requests\ResetearPasswordRequest;
use App\Http\Requests\InsertarEmpleadoRequest;
use App\Http\Requests\ActualizarEmpleadoRequest;
use App\Http\Requests\TipoUsuarioRequest;
use App\Http\Requests\ListarAsistenciaFecha;
use PhpParser\Node\Expr\Empty_;
use App\Models\Area;
use App\Models\Unidad;
use App\Models\Subarea;
use App\Models\Perfil;
use App\Models\Marca;
use DateTime;

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
        // $bajada =  '0001-01-01';
        $dias = 0;
        DB::statement(
            'call pa_insertar_empleado(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $request->emp_nombre,
                $request->emp_apellido,
                $request->emp_fechabaja,
                $request->emp_fec_inicio_prueba,
                $request->emp_Fec_fin_prueba,
                $request->emp_TurnoId,
                $request->emp_AreaId,
                $request->emp_dni,
                $request->emp_carrera,
                $request->emp_email,
                $request->emp_telefono,
                $request->emp_link_cv,
                $request->Emp_Id_Condicion_capacitacion_fk,
                $request->emp_link_calificaciones,
                $request->Emp_Id_Convenio_fk,
                $request->emp_link_convenio,
                $request->emp_fechanac,
                $dias
            ]
        );
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
    public function dashboard_ma_ta()
    {
        $turno_mt = DB::select("call pa_contar_asistenciaDiaria('3')");
        return response()->json([
            // 'respuesta' => 'true',
            'puntualidad' => $turno_mt[0]->Estado,
            'v_puntualidad' => $turno_mt[0]->Cantidad,
            'tardanza' => $turno_mt[1]->Estado,
            'v_tardanza' => $turno_mt[1]->Cantidad,
            'faltas_in' => $turno_mt[2]->Estado,
            'v_faltas_in' => $turno_mt[2]->Cantidad,
            'faltas_jus' => $turno_mt[3]->Estado,
            'v_faltas_jus' => $turno_mt[3]->Cantidad,
            'sin_marcar' => $turno_mt[4]->Estado,
            'v_sin_marcar' => $turno_mt[4]->Cantidad
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
        $empleadoActual  = Empleado::where('Emp_Id', $id)->first();
        if (isset($empleadoActual)) {
            $resultadoEncontrado = true;
            // En caso de encontrar registro
        } else {
            // En caso de no encontrar registro
        }
        if ($resultadoEncontrado) {
            foreach ($todas_empleados as $empleado) {

                if ($empleadoActual->Emp_Id == $empleado->Id) {
                } else {
                    if ($empleado->Dni == $request->emp_dni) {
                        return response()->json([
                            'respuesta' => false,
                            'errors' => [
                                "emp_dni" => [
                                    "El dni ya existe"
                                ]
                            ]
                        ], 422);
                    }
                }
            }
        } else {
            return response()->json([
                "res" => false,
                "msg" => "No se encontro el registro. Vuelva a intentarlo"
            ]);
        }


        $request->emp_dias_extra = $request->emp_dias_extra == null ? 0 : $request->emp_dias_extra;
        DB::statement(
            'call pa_actualizar_empleados(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $id,
                $request->emp_nombre,
                $request->emp_apellido,
                $request->emp_fechabaja,
                $request->emp_fec_inicio_prueba,
                $request->emp_Fec_fin_prueba,
                $request->emp_TurnoId,
                $request->emp_AreaId,
                $request->emp_dni,
                $request->emp_carrera,
                $request->emp_email,
                $request->emp_telefono,
                $request->emp_link_cv,
                $request->Emp_Id_Condicion_capacitacion_fk,
                $request->emp_link_calificaciones,
                $request->Emp_Id_Convenio_fk,
                $request->emp_link_convenio,
                $request->emp_fechanac,
                $request->emp_dias_extra,
            ]
        );
        return response()->json([
            'respuesta' => 'true',
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
        if ($usuario != null) {
            $tipoUsuario = 'Tipo Usuario';
            return response()->json([
                'res' => true,
                // 'msg' => 'Listado Correcto :)',
                'tipoUsuario' => 'El dni corresponde a un ' . $usuario[0]->$tipoUsuario,
                'dni' => $usuario[0]->Dni,
                'nombre' => $usuario[0]->Nombre,
                'apellido' => $usuario[0]->Apellido,
                'perfil' => $usuario[0]->Perfil,
                'unidad' => $usuario[0]->Unidad,
                'turno' => $usuario[0]->Turno,
                'id' => $usuario[0]->Id,
            ], 200);
        } else {
            return response()->json([
                'res' => true,
                // 'msg' => 'Listado Correcto :)',
                'tipoUsuario' => 'El dni ingresado no existe'
            ], 200);
        }
    }

    public function mostrarSoloTipoUsuario(Request  $request)
    {
        $userAux = $request->user()->currentAccessToken();
        if ($userAux != null) {
            return response()->json([
                'res' => true,
                'soloTipoUsuario' => $userAux->tokenable->usu_Tipo_User_Id_fk,
            ], 200);
        } else {
            return response()->json([
                'res' => true,
                'tipoUsuario' => 'Error, no se pudo encontrar  token. Vuelva a logearse'
            ], 200);
        }
    }

    public function filtradoFecha(ListarAsistenciaFecha $request)
    {
        $asistencias = DB::select("call pa_listar_asistencia_filtroFechas('$request->fecha_inicio','$request->fecha_fin')");

        return response()->json([
            'res' => true,
            'Asistencia' => $asistencias,
        ], 200);
    }
    public function asistenciaTotal()
    {
        $fechaActual = date('Y-m-d');
        $asistencias = DB::select("call pa_listar_asistencia_filtroFechas('0001-01-01','$fechaActual')");
        return response()->json([
            'res' => true,
            'Asistencias' => $asistencias,
        ], 200);
    }

    public function listarAreas()
    {
        $areas = Area::all();
        foreach ($areas as $area) {
            $arreglo[] = $area->Area_Nombre;
        }
        return response()->json([
            'res' => true,
            // 'msg' => 'Listado Correcto :)',
            'Areas' => $arreglo,
        ], 200);
    }
    public function listarUnidades()
    {
        $unidades = Unidad::all();
        foreach ($unidades as $unidad) {
            $arreglo[] = $unidad->Unidad_Nombre;
        }
        return response()->json([
            'res' => true,
            // 'msg' => 'Listado Correcto :)',
            'Unidades' => $arreglo,
        ], 200);
    }
    public function listarSubareas()
    {
        $subareas = Subarea::all();
        foreach ($subareas as $subarea) {
            $arreglo[] = $subarea->SubArea_Nombre;
        }
        return response()->json([
            'res' => true,
            // 'msg' => 'Listado Correcto :)',
            'Subareas' => $arreglo,
        ], 200);
    }
    public function listarPerfiles()
    {
        $perfiles = Perfil::all();
        foreach ($perfiles as $perfil) {
            $arreglo[] = $perfil->Perfil_Nombre;
        }
        return response()->json([
            'res' => true,
            // 'msg' => 'Listado Correcto :)',
            'Perfiles' => $arreglo,
        ], 200);
    }
    public function listarMarcas()
    {
        $marcas = Marca::all();
        foreach ($marcas as $marca) {
            $arreglo[] = $marca->Marca_Nombre;
        }
        return response()->json([
            'res' => true,
            // 'msg' => 'Listado Correcto :)',
            'Marcas' => $arreglo,
        ], 200);
    }
    
    public function pasarTokenAOtroRepo(){
        $userAux = $request->user()->currentAccessToken();
        return redirect()->away('http://localhost:8080/api/login/token');
    }
}
