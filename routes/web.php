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
*/

Route::get('/', function () {
    return view('inicio');
});
Auth::routes();

Route::get('/usuarios','UsuariosController@index');
Route::post('/usuarioss','UsuariosController@authenticate');
Route::get('/log','UsuariosController@inlog');
Route::resource('usuarios','UsuariosController');
Route::get('/usuarios/crear','UsuariosController@show')->name('crear_usuario');

Route::get('/locales','LocalesController@index');
Route::get('/locales/crear','LocalesController@show')->name('crear_locales');
Route::resource('locales','LocalesController');
Route::get('/locanesNat','LocalesController@mostrarLocales');

Route::get('/comidas','ComidasController@show');
Route::resource('comidas','ComidasController');
Route::get('comidas2', 'Api\localesController@index');

Route::get('/categorias','CategoriasController@index');
Route::get('/crearCategoria','CategoriasController@crear');
Route::resource('categorias','CategoriasController');

Route::get('/ingredientes','IngredientesController@show');
Route::resource('ingredientes','IngredientesController');

Route::get('/horarios','HorariosController@show');
Route::resource('horarios','HorariosController');

Route::get('/direcciones','DireccionesController@show');
Route::resource('direcciones','DireccionesController');
Route::get('/direcciones/crear','LocalesController@crear')->name('crear_direccion');

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'ComidasController@autocomplete'));

Route::get('municipios/{id}','DireccionesController@getTowns');
Route::get('towns/{id}','DireccionesController@getTowns');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
