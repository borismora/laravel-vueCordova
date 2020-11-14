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
    return view('auth.login');
    
});

/*Route::get('/crear', function () {
    return view('usuarios.create');
    
});*/

Route::resource('/usuarios','UserController');
Route::resource('/InfoContacto','InfoContactoController'); 
Route::get('elimi/{id}','UserController@eliminar');
Route::get('pdf','PdfController@generarpdf');
Auth::routes();



//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/client', 'ClientController@index')->middleware('auth');
