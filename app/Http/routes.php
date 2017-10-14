<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/report', function () {
    return view('pages.welcome');
});


Route::get('/' , ['as' => 'pages.home', 'uses' => 'FaultsController@home']);

Route::resource('respond', 'RespondMailController');


Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as'=> 'logout', 'uses' =>'Auth\AuthController@getLogout']);

Route::resource('fault', 'FaultsController');

Route::get('/completed-faults' , ['as' => 'fault.completed', 'uses' => 'FaultsController@completed']);


Route::get('/customer-faults', function (){
    return view('pages.customerForm');
});

Route::post('/customer-faults', ['as' => 'fault.report', 'uses' => 'FaultsController@customerStore']);

Route::get('/thank', function (){
    return view('pages.thank');
});
