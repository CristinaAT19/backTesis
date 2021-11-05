<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\Api\AdministradorController;
use App\Http\Controllers\Api\AsistenciaController;

Route::post('marcar', [AsistenciaController::class, 'marcarAsistencia']);
Route::post('registro', [AutenticarController::class, 'registro']);
Route::post('acceso', [AutenticarController::class, 'acceso']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('cerrarsesion', [AutenticarController::class, 'cerrarSesion']);
    Route::post('insertarEmpleado', [AdministradorController::class, 'insertarEmpleado']);
    Route::get('listarEmpleados', [AdministradorController::class, 'listarEmpleados']);
    Route::post('actualizarEmpleado/{id}', [AdministradorController::class, 'actualizarEmpleado']);
});
