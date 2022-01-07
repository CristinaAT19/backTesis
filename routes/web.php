<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Para documentacion de apis
Route::get('readFileJson',[DocumentController::class,'readFileJson'])->name('readFileJson');
Route::get('writeFileJson',[DocumentController::class,'writeFileJson'])->name('writeFileJson');
Route::get('newRegister',[DocumentController::class,'registerApi'])->name('register.api');