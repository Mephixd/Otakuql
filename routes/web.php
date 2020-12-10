<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\LoginController;
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

Route::get('/',[AnimeController::class,'index'])->name('home');


/** lOGIN  */
Route::get('/registro',[LoginController::class,'view_registro'])->name('registro.view');
Route::get('/login',[LoginController::class,'view_login'])->name('login.view');
Route::post('loguear',[LoginController::class,'login'])->name('login');
Route::post('registrar',[LoginController::class,'registro'])->name('registro');




/** FIN LOGIN */