<?php

Route::get('/', function () {
    return view('welcome');
});




 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/generate', 'GenerateController@index')->name('generate');
Route::post('/generate', 'GenerateController@create')->name('generate');
Route::get('/intervention', 'InterventionController@index')->name('intervention');
Route::get('/sessioninfo', 'SessioninfoController@index')->name('sessioninfo');
Route::post('/sessioninfo', 'SessioninfoController@show')->name('sessioninfo');
Route::group(['middleware' => 'web'], function () {
    Route::resource('materiel', 'API\MaterielController');
    });

