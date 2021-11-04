<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\Api\AdministradorController;
use App\Http\Controllers\Api\AsistenciaController;
use App\Http\Controllers\Api\UsuarioController;

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
    Route::post('cerrarsesion', [AutenticarController::class, 'cerrarSesion']);
    Route::post('insertarEmpleado', [AdministradorController::class, 'insertarEmpleado']);
    Route::get('listarEmpleados', [AdministradorController::class, 'listarEmpleados']);
});
