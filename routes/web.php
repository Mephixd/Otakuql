<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;



/* Home */
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/Ver/Anime',[HomeController::class,'play_anime'])->name('anime.play');
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

/*Admin Generos */
Route::get('/admin/generos',[GeneroController::class,'index'])->name('admin.genero');
Route::get('/admin/generos/table',[GeneroController::class,'genero_table']);
Route::post('/admin/generos/create',[GeneroController::class,'create_genero'])->name('admin.genero.create');
Route::get('/admin/generos/edit/{id}',[GeneroController::class,'edit_genero'])->name('admin.genero.edit');
Route::put('/admin/generos/update/{id}',[GeneroController::class,'update_genero'])->name('admin.genero.update');
Route::post('/admin/generos/delete',[GeneroController::class,'delete_genero'])->name('admin.genero.delete');


/*Admin Animes */
Route::get('/admin/animes',[AnimeController::class,'index'])->name('admin.anime');
Route::get('/admin/animes/table',[AnimeController::class,'anime_table']);
Route::get('/admin/animes/create',[AnimeController::class,'create_anime'])->name('admin.anime.create');
Route::post('/admin/animes/store',[AnimeController::class,'store_anime'])->name('admin.anime.store');
Route::get('/admin/animes/edit/{id}',[AnimeController::class,'edit_anime'])->name('admin.anime.edit');
Route::put('/admin/animes/update/{id}',[AnimeController::class,'update_anime'])->name('admin.anime.update');
Route::post('/admin/animes/delete',[AnimeController::class,'delete_anime'])->name('admin.anime.delete');

/* FIN ADMIN */


/** lOGIN  */

Route::get('/registro',[LoginController::class,'view_registro'])->name('registro.view');
Route::get('/login',[LoginController::class,'view_login'])->name('login.view');
Route::post('/loguear',[LoginController::class,'login'])->name('login');
Route::post('/registrar',[LoginController::class,'registro'])->name('registro');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

/** FIN LOGIN */




/* Catalogo */ 
Route::get('/catalogo',[CatalogoController::class,'catalogo'])->name('catalogo');
Route::get('/anime/{anime}',[CatalogoController::class,'review_Anime'])->name('review.anime');
Route::get('buscarAnime',[CatalogoController::class,'buscarAnime'])->name('buscarAnime');

/*Fin catalogo */



Route::get('test', function() {
    Storage::disk('google')->put('./test.txt', 'Hello World');
    dd("Guardado");
});