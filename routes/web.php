
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::resource('almacen/herramienta','HerramientasController');

Route::resource('almacen/articulo','ArticulosController');
	
Route::resource('almacen/carrito', 'CarritoController');
 // que onda soy kevin 