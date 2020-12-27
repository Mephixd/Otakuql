<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



/* Home */
Route::get('/',[AnimeController::class,'index'])->name('home');
Route::get('/categorias',[AnimeController::class,'categorias'])->name('categorias');
Route::get('/Ver/Anime',[AnimeController::class,'play_anime'])->name('anime.play');

/* FIn Home */

/* ADMIN */

Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::get('/admin/users',[AdminController::class,'view_users'])->name('admin.users');
Route::get('/admin/user/{id_user}',[AdminController::class,'edit_user'])->name('admin.users.edit');
Route::put('/admin/user/{id_user}',[AdminController::class,'update_user'])->name('admin.users.update');
Route::post('/admin/user',[AdminController::class,'delete_user'])->name('admin.users.delete');
Route::get('/admin/users/table',[AdminController::class,'users_table']);

/*Admin roles */
Route::get('/admin/roles',[AdminController::class,'view_roles'])->name('admin.roles');
Route::get('/admin/roles/table',[AdminController::class,'roles_table']);
Route::get('/admin/roles/edit/{id}',[AdminController::class,'role_edit'])->name('admin.edit');
Route::put('/admin/roles/update/{id}',[AdminController::class,'role_update'])->name('admin.roles.update');
Route::get('/admin/roles/create',[AdminController::class,'create_rol'])->name('admin.roles.create');
Route::post('/admin/roles/create',[AdminController::class,'store_rol'])->name('admin.roles.store');
Route::post('/admin/roles/delete',[AdminController::class,'delete_rol'])->name('admin.role.delete');


/* FIN ADMIN */


/** lOGIN  */

Route::get('/registro',[LoginController::class,'view_registro'])->name('registro.view');
Route::get('/login',[LoginController::class,'view_login'])->name('login.view');
Route::post('/loguear',[LoginController::class,'login'])->name('login');
Route::post('/registrar',[LoginController::class,'registro'])->name('registro');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


/** FIN LOGIN */