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
// get pones la url manualmente funciona
// post si o si tiene q ser mediante una peticion
// los post solo funciona con los formularios
Route::get('/aplicacion','pruebaController@personalizado'); 
Route::get('/bienvenida','pruebaController@bienvenida'); 
Route::get('/', function () {

//	return "hola";
    return view('welcome'); 
});



Route::get('/para/{nombre}/{edad}','pruebaController@parametro'); 
//Auth::routes();



Route::get('/home', 'HomeController@index')->name('home'); 

//login
Route::get('/login','Auth\AuthController@getLogin'); 
Route::post('/login','Auth\AuthController@postLogin'); 


//registro
Route::get('/register','Auth\AuthController@register'); 
Route::post('/register','Auth\AuthController@postregister'); 


//salir
Route::get('/logout','Auth\AuthController@getLogout'); 
Route::post('/logout','Auth\AuthController@getLogout'); 

//Route::get('/', ['as' => 'auth/login', 'uses' => 'Auth\AuthController@getLogin']);   
//Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);   
//Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']); 

