<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\Api\AdministradorController;
use App\Http\Controllers\Api\AsistenciaController;

Route::post('marcar', [AsistenciaController::class, 'marcarAsistencia']);
Route::post('registro', [AutenticarController::class, 'registro']);
Route::post('acceso', [AutenticarController::class, 'acceso']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('dashboard_ma', [AdministradorController::class, 'dashboard_ma']); //mostrar el dashboard de asistencia del turno mañana 
    Route::get('dashboard_ta', [AdministradorController::class, 'dashboard_ta']); //mostrar el dashboard de asistencia del turno tarde
    Route::get('tablas_administrador/{turno}', [AdministradorController::class, 'tablas_administrador']); //mostrar las tablas de asistencias y sin marcar al administrador
    Route::get('dashboardUsuario/{dni}', [UsuarioController::class, 'dashboardUsuario']);
    Route::get('calendario/{dni}', [UsuarioController::class, 'calendarioUsuario']); //mostrar el calendario del usuario
    Route::post('cerrarsesion', [AutenticarController::class, 'cerrarSesion']);
    Route::post('insertarEmpleado', [AdministradorController::class, 'insertarEmpleado']);
    Route::get('listarEmpleados', [AdministradorController::class, 'listarEmpleados']);
});
