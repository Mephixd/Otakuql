<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
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

/* ADMIN */

Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::get('/admin/users',[AdminController::class,'view_users'])->name('admin.users');
Route::get('/admin/user/{id_user}',[AdminController::class,'edit_user'])->name('admin.users.edit');
Route::post('/admin/user/{id_user}',[AdminController::class,'update_user'])->name('admin.users.update');
Route::post('/admin/user/{id_user}',[AdminController::class,'delete_user'])->name('admin.users.delete');

Route::get('/admin/users/table',[AdminController::class,'users_table']);

Route::get('/admin/roles/create',[AdminController::class,'create_rol'])->name('admin.roles.create');
Route::post('/admin/roles/create',[AdminController::class,'store_rol'])->name('admin.roles.store');


/* FIN ADMIN */


/** lOGIN  */

Route::get('/registro',[LoginController::class,'view_registro'])->name('registro.view');
Route::get('/login',[LoginController::class,'view_login'])->name('login.view');
Route::post('/loguear',[LoginController::class,'login'])->name('login');
Route::post('/registrar',[LoginController::class,'registro'])->name('registro');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


/** FIN LOGIN */