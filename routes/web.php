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

Route::group(['middleware' => 'auth'],function(){
  
});

  Route::resource('user','UserController');
    Route::POST('logout',['uses'=>'UserController@logout']);

Route::get('/',['uses'=>'UserController@login','as'=>'login']);
// Route::POST('login',['uses'=>'UserController@authenticate']);


Route::get('mobil',['uses'=>'UserController@cetakMobil']);

Route::resource('departement','DepartementController');

Route::resource('permission','PermissionController');

Route::resource('role','RoleController');
// Auth::routes();

// Route::get('/home', 'HomeController@index');
