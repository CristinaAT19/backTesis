<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsertarFeriado;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeriadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InsertarFeriado $request)
    {
        try{
            DB::statement(
                'call pa_actualizar_feriados(?,?,?)',
                [
                    $request->fecha_feriado,
                    $request->dia_feriado,
                    $request->tipo_feriado
                ]
            );    

        }catch(Exception $e){
            return response()->json(['msg'=>"Ocurrio un error en la base de datos. Reporte con el administrador"], 500);
        }
        return response()->json([
            'res' => true,
        ], 204);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            DB::statement(
                'call pa_eliminar_feriados(?)',
                [
                    $request->fecha_feriado
                ]
            );    

        }catch(Exception $e){
            return response()->json(['msg'=>"Ocurrio un error en la base de datos. Reporte con el administrador"], 500);
        }
        return response()->json([
            'res' => true,
        ], 204);
    }
}
