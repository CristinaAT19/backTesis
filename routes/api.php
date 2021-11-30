<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\Api\AdministradorController;
use App\Http\Controllers\Api\AsistenciaController;

use App\Http\Controllers\Api\UsuarioController;



Route::post('marcar', [AsistenciaController::class, 'marcarAsistencia']);
Route::post('acceso', [AutenticarController::class, 'acceso']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('dashboard_ma', [AdministradorController::class, 'dashboard_ma']); //mostrar el dashboard de asistencia del turno mañana 
    Route::get('dashboard_ta', [AdministradorController::class, 'dashboard_ta']); //mostrar el dashboard de asistencia del turno tarde
    Route::get('tablas_administrador', [AdministradorController::class, 'tablas_administrador']); //mostrar las tablas de asistencias y sin marcar al administrador
    //Manejo de faltas
    Route::get('tabla_faltas', [AdministradorController::class, 'listar_faltas']);
    Route::post('tabla_faltas/{id}', [AdministradorController::class, 'actualizar_estado_faltas']);

    Route::get('dashboardUsuario/{dni}', [UsuarioController::class, 'dashboardUsuario']); //mostrar el dashboard de un usuario
    Route::get('calendario/{dni}', [UsuarioController::class, 'calendarioUsuario']); //mostrar el calendario del usuario
    Route::post('cambiarPassword', [UsuarioController::class, 'cambiarPassword']);
    Route::post('cerrarsesion', [AutenticarController::class, 'cerrarSesion']);
    Route::get('listarAdministrador', [AdministradorController::class, 'listarAdministrador']);
    Route::post('resetearPassword', [AdministradorController::class, 'resetPassword']);
    Route::post('cambiarTipoUsuario', [AdministradorController::class, 'cambiarTipoUsuario']);
    Route::post('insertarEmpleado', [AdministradorController::class, 'insertarEmpleado']);
    Route::get('listarEmpleados', [AdministradorController::class, 'listarEmpleados']);

    Route::post('actualizarEmpleado/{id}', [AdministradorController::class, 'actualizarEmpleado']);
    Route::post('mostrarTipoUsuario', [AdministradorController::class, 'mostrarTipoUsuario']);
});
Route::get('marcarFaltas/{turno}', [AsistenciaController::class, 'marcarFaltas']);
Route::get('inactividad', [AutenticarController::class, 'eliminarTokenInactividad']);
Route::get('limpiarFaltas', [AsistenciaController::class, 'limpiarFaltas']);
Route::get('limpiarAsistencias', [AsistenciaController::class, 'limpiarAsistencias']);
