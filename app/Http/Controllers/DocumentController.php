<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function readFileJson(){
        $datos_clientes = file_get_contents("clientes.json");
        $json_clientes = json_decode($datos_clientes);
        $json_clientes =collect($json_clientes);
        return view('prueba2', compact('json_clientes'));
    }

    public function writeFileJson(){
        $data = [
            'success'=>true,
            'apiAsistencia' => array(
                array('Nombre'=>'Marcar asistencia', 'Ruta'=>'https://desarrollo.consigueventas.com/Backend/public/api/marcar','Descripcion'=>"Sirve para marcar asistencia",'Requisitos'=>'Todos los datos deben ser varchar',
                        'Metodo'=>'POST','CamposRequeridos'=>"dni,plataforma,useragent,usertime",
                        'Ejemplo'=>['{"dni" : "73615048","plataforma" : "web","useragent" : "agente","usertime" : "tiempo marcado"}']),
        
                array('Nombre'=>'Ver lista de feriados', 'Ruta'=>'https://desarrollo.consigueventas.com/Backend/public/api/marcar','Descripcion'=>"Sirve para marcar asistencia",'Requisitos'=>'Todos los datos deben ser varchar',
                'Metodo'=>'get','CamposRequeridos'=>"dni,plataforma,useragent,usertime",
                'Ejemplo'=>['{"dni" : "73615048","plataforma" : "web","useragent" : "agente","usertime" : "tiempo marcado"}']),
    
            ),
            'apiErp' => array(
                array('Nombre'=>'Sistema ERP 1', 'Ruta'=>'https://desarrollo.consigueventas.com/Backend/public/api/marcar','Descripcion'=>"Sirve para marcar asistencia",'Requisitos'=>'Todos los datos deben ser varchar',
                'Metodo'=>'get','CamposRequeridos'=>"dni,plataforma,useragent,usertime",
                'Ejemplo'=>['{"dni" : "73615048","plataforma" : "web","useragent" : "agente","usertime" : "tiempo marcado"}']),
                array('Nombre'=>'Sistema ERP 2', 'Ruta'=>'https://desarrollo.consigueventas.com/Backend/public/api/marcar','Descripcion'=>"Sirve para marcar asistencia",'Requisitos'=>'Todos los datos deben ser varchar',
                'Metodo'=>'get','CamposRequeridos'=>"dni,plataforma,useragent,usertime",
                'Ejemplo'=>['{"dni" : "73615048","plataforma" : "web","useragent" : "agente","usertime" : "tiempo marcado"}']),
                )

        ];
        $data_to_file_json = json_encode($data);
        $file = 'clientes.json';
        file_put_contents($file, $data_to_file_json);        
        return "bien";        
    }

    public function registerApi(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'route' => 'required|url|max:255|min:3',
            'description' => 'required|string|max:255|min:3',
            'requirement' => 'required|in:Ninguna,Bearer',
            'fieldRequired' => 'nullable|string|max:800|min:3',
            'method'=>'required|in:GET,POST,PUT,DELETE',
            'ejemplo'=>'nullable|string|max:1000|min:3',
        ]);
        // $request->fieldRequired = $request->fieldRequired == null ? 'Ninguno' : $request->fieldRequired;
        $fieldRequired = $request->fieldRequired!=null ? $request->fieldRequired : "No hay campos requeridos";
        $ejemplo = $request->ejemplo!=null ? $request->ejemplo : "No hay ejemplo";

        // Lee archivo json
        $datos_clientes = file_get_contents("clientes.json");
        $json_clientes = json_decode($datos_clientes);
        $json_asistencia = $json_clientes;
        $json_asistencia->apiAsistencia[] = array('Nombre'=>$request->name,'Ruta'=>$request->route,'Descripcion'=>$request->description,'Requisitos'=>$request->requirement,'Metodo'=>$request->method,'CamposRequeridos'=>$fieldRequired,'Ejemplo'=>$ejemplo);
        $json_asistencia = json_encode($json_asistencia);
        $file = 'clientes.json';
        file_put_contents($file, $json_asistencia);
        return redirect()->route('readFileJson');
    }
}
