<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('Controlador','PruebaController@index');
Route::get('ControladorNombre/{nombre}','PruebaController@nombre');
Route::resource('movie','MovieController');

Route::get('prueba', function(){
	return "Hola desde Rutes/web.php";
});

Route::get('nombre/{nombre}', function($nombre){
	return "mi nombre es: ".$nombre;
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('amor/{verdadero}', function($verdadero){
	return "Te amo demasiado y es en serio ".$verdadero;
});
*/
Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');
Route::get('admin','FrontController@admin');

Route::resource('usuario','UsuarioController');
Route::resource('pelicula','MovieController');
Route::resource('genero','GeneroController');
Route::resource('mail','MailController');
Route::get('genero','GeneroController@index');
Route::resource('log','LogController');
Route::get('logout','LogController@logout');
//['route'=>'usuario.store', 'method'=>'POST']