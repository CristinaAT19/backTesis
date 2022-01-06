<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompetenciaRequest;
use App\Models\Perfil;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReclutamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarPerfiles()
    {
        try {            
            $perfiles = Perfil::all();
        } catch (Exception $e) {
            return response()->json(['error' => 'Ocurrio un error en el servidor'], 500);
        }
        return response()->json([
            'res' => true,
            'perfiles' => $perfiles
        ], 200);
    }

    public function obtenerDatosPorPerfil($idPerfil){
        try {         
            $listado = DB::select(
                'call pa_listar_estructura(?)',
                [
                    $idPerfil,
                ]
            );
        } catch (Exception $e) {
            return response()->json(['error' => 'Ocurrio un error en el servidor'], 500);
        }
        return response()->json([
            'res' => true,
            'perfiles' => $listado
        ], 200);

    }

    public function mostrarRequerimientos()
    {
        $requerimientos = [];
        try {
            $requerimientos = [
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'edad' => '25',
                'dni' => '12345678',
                'direccion' => 'Av. Siempre Viva 123',
                'telefono' => '12345678',
                'email' => 'algo@algo.con'
            ];
        } catch (Exception $e) {
            return response()->json(['error' => 'Ocurrio un error en el servidor'], 500);
        }
        return response()->json([
            'res' => true,
            'perfiles' => $requerimientos
        ], 200);
    }


    public function mostrarCompetencias()
    {
        $competencias = [];
        try {
            $competencias = [
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'edad' => '25',
                'dni' => '12345678',
                'direccion' => 'Av. Siempre Viva 123',
                'telefono' => '12345678',
                'email' => 'algo@algo.con'
            ];
        } catch (Exception $e) {
            return response()->json(['error' => 'Ocurrio un error en el servidor'], 500);
        }
        return response()->json([
            'res' => true,
            'perfiles' => $competencias
        ], 200);
    }

    public function agregarCompetencia(CompetenciaRequest $request)
    {
        return response()->json([
            'res' => true,
            'msg' => 'Competencia creada correctametne'
        ], 201);
    }

    public function modificarCompetencia(CompetenciaRequest $request, $id)
    {
        // Validacion en caso de que no coloque ID en la URL
        $validacionUrl = validateParamsIdInUrl($id);
        if($validacionUrl != null) {
            return response()->json(['res' => false, 'errors' => $validacionUrl], 422);            
        }
        return response()->json([
            'res' => true,
            'msg' => 'Modificado correctamente'
        ], 204);
    }

    public function eliminarCompetencia($id)
    {
        // Validacion si existe

        // Validacion en caso de que no coloque ID en la URL
        $validacionUrl = validateParamsIdInUrl($id);
        if($validacionUrl != null) {
            return response()->json(['res' => false, 'errors' => $validacionUrl], 422);            
        }

        // Falta validar si existe o no la competencia
        try {
            // Consumo de procedimiento almacenado
        } catch (Exception $e) {
            return response()->json(['res' => false, 'errors' => "Error no encontrado"], 500);
        }
        return response()->json([
            'res' => true,
            'msg' => 'Eliminado correctamente'
        ], 204);
    }
}
