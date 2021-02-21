<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function() {
    Route::get('/links', 'LinkController@index');
    Route::get('/links/new', 'LinkController@create');
    Route::post('/links/new', 'LinkController@store');
    Route::get('/links/{link}', 'LinkController@edit');
    Route::delete('/links/{link}', 'LinkController@destroy');

    Route::get('/settings', 'UserController@edit');
    Route::post('/settings', 'UserController@update');

});

Route::post('/visit/{link}', 'VisitController@store');

Route::get('/{user}', 'UserController@show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
