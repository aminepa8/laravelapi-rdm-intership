<?php

Route::get('/', function () {
    return view('welcome');
});




 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/generate', 'GenerateController@index')->name('generate');
Route::post('/generate', 'GenerateController@create')->name('generate');
Route::group(['middleware' => 'web'], function () {
    Route::resource('materiel', 'API\MaterielController');
    });

