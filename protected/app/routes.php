<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

Route::get('logout', function()
{
	return View::make('login');
});


Route::get('home', 'RegistrationController@login');
Route::post('home', 'RegistrationController@authenticate');

Route::get('login', 'RegistrationController@register'); 
Route::post('login', 'RegistrationController@store');

 
Route::resource('menus','MenuController');
Route::resource('groups','GroupController');
Route::resource('groupmenus','GroupMenuController');



Route::resource('das','DasController');
Route::resource('ws','WsController');

Route::get('wsdtl/destroy/{id}', 'WsdtlController@destroy');

//Route::get('ws/create','WsController@create');
//Route::post('ws/create','WsController@tambahPropinsi');

Route::resource('wsdtl','WsdtlController@store');
Route::post('wsdtl/tambah','WsdtlController@store');

Route::resource('wilayahsungai','WilayahSungaiController');


Route::resource('sungais','SungaiController');






