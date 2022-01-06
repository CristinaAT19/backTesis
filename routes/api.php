<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\Api\AdministradorController;
use App\Http\Controllers\Api\AsistenciaController;

use App\Http\Controllers\Api\UsuarioController;



Route::post('marcar', [AsistenciaController::class, 'marcarAsistencia']);
Route::post('acceso', [AutenticarController::class, 'acceso']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Identificar segun el token enviado
    Route::get('identificarPorToken', [AutenticarController::class, 'identificarPorToken']);

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard_ma', [AdministradorController::class, 'dashboard_ma']); //mostrar el dashboard de asistencia del turno mañana 
        Route::get('dashboard_ta', [AdministradorController::class, 'dashboard_ta']); //mostrar el dashboard de asistencia del turno tarde
        Route::get('dashboard_ma_ta', [AdministradorController::class, 'dashboard_ma_ta']); //mostrar el dashboard de asistencia del turno tarde
        Route::get('tablas_administrador', [AdministradorController::class, 'tablas_administrador']); //mostrar las tablas de asistencias y sin marcar al administrador
        Route::get('tabla_faltas', [AdministradorController::class, 'listar_faltas']);
        Route::post('tabla_faltas/{id}', [AdministradorController::class, 'actualizar_estado_faltas']);
        Route::post('cambiarTipoUsuario', [AdministradorController::class, 'cambiarTipoUsuario']);
        Route::post('insertarEmpleado', [AdministradorController::class, 'insertarEmpleado']);
        Route::get('listarEmpleados', [AdministradorController::class, 'listarEmpleados']);
        Route::get('listarAdministrador', [AdministradorController::class, 'listarAdministrador']);
        Route::post('actualizarEmpleado/{id}', [AdministradorController::class, 'actualizarEmpleado']);
        Route::post('resetearPassword', [AdministradorController::class, 'resetPassword']);
        Route::get('filtradoFecha', [AdministradorController::class, 'filtradoFecha']);
        Route::get('asistenciaTotal', [AdministradorController::class, 'asistenciaTotal']);
    });

    //Manejo de faltas

    Route::get('dashboardUsuario/{dni}', [UsuarioController::class, 'dashboardUsuario']); //mostrar el dashboard de un usuario
    Route::get('calendario/{dni}', [UsuarioController::class, 'calendarioUsuario']); //mostrar el calendario del usuario
    Route::post('cambiarPassword', [UsuarioController::class, 'cambiarPassword']);
    Route::post('cerrarsesion', [AutenticarController::class, 'cerrarSesion']);
    Route::post('mostrarTipoUsuario', [AdministradorController::class, 'mostrarTipoUsuario']);
    Route::get('seeMyRoutes', [AdministradorController::class, 'mostrarSoloTipoUsuario']);

    // Pasar token a otro repositorio

    // Route::get('pasarTOkenAOtroRepo', [AdministradorController::class, 'pasarTokenAOtroRepo']);
});
Route::get('marcarFaltas/{turno}', [AsistenciaController::class, 'marcarFaltas']);
Route::get('inactividad', [AutenticarController::class, 'eliminarTokenInactividad']);
Route::get('limpiarFaltas', [AsistenciaController::class, 'limpiarFaltas']);
Route::get('limpiarAsistencias', [AsistenciaController::class, 'limpiarAsistencias']);
Route::get('verificarToken/{dni}', [AutenticarController::class, 'verificarToken']);
Route::get('areas', [AdministradorController::class, 'listarAreas']);
Route::get('unidades', [AdministradorController::class, 'listarUnidades']);
Route::get('subarea', [AdministradorController::class, 'listarSubareas']);
Route::get('perfil', [AdministradorController::class, 'listarPerfiles']);
Route::get('marcas', [AdministradorController::class, 'listarMarcas']);

Route::post('agregarPerfil', [AdministradorController::class, 'agregarPerfil']); 
Route::post('actualizarPerfil/{id}', [AdministradorController::class, 'actualizarPerfil']); 
Route::post('eliminarPerfiles/{id}', [AdministradorController::class, 'eliminarPerfil']); 

Route::post('actualizarPuntuacionCv/{id}', [AdministradorController::class, 'actualizarPuntuacionCv']); 
Route::post('actualizarPuntajeConducta/{id}', [AdministradorController::class, 'actualizarPuntajeConducta']); 
Route::post('actualizarPuntajeEntrevista/{id}', [AdministradorController::class, 'actualizarPuntajeEntrevista']); 
Route::post('actualizarPuntajeConocimientos/{id}', [AdministradorController::class, 'actualizarPuntajeConocimientos']);
Route::get('listarCalificacionGeneral', [AdministradorController::class, 'listarCalificacionGeneral']); 
Route::get('listarRevisionCv', [AdministradorController::class, 'listarRevisionCv']); 
Route::get('listarObservacionConducta', [AdministradorController::class, 'listarObservacionConducta']); 
Route::get('listarEntrevistaStar', [AdministradorController::class, 'listarEntrevistaStar']); 
Route::get('listarEvaluacionConocimientos', [AdministradorController::class, 'listarEvaluacionConocimientos']); 