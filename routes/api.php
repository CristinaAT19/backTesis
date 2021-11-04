<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\Api\AsistenciaController;
use App\Http\Controllers\Api\AdministradorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('administrador', [AdministradorController::class, 'dashboardAdministrador']);

Route::post('marcar', [AsistenciaController::class, 'marcarAsistencia']);
Route::post('registro', [AutenticarController::class, 'registro']);
Route::post('acceso', [AutenticarController::class, 'acceso']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('dashboard_ma', [AdministradorController::class, 'dashboard_ma']); //mostrar el dashboard de asistencia del turno mañana 
    Route::get('dashboard_ta', [AdministradorController::class, 'dashboard_ta']); //mostrar el dashboard de asistencia del turno tarde
    Route::get('tablas_administrador/{turno}', [AdministradorController::class, 'tablas_administrador']); //mostrar las tablas de asistencias y sin marcar al administrador
    // Route::get('dashboard_usu/{dni}', [AdministradorController::class, 'dashboard_usu']);
    Route::post('cerrarsesion', [AutenticarController::class, 'cerrarSesion']);
    //Manejo de faltas
    Route::get('tabla_faltas',[AdministradorController::class,'listar_faltas']);
    Route::patch('tabla_faltas/{id}', [AdministradorController::class,'actualizar_estado_faltas']);
});
