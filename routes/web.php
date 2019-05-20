<?php

Route::get('/', function () {
    return view('welcome');
});




 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'web'], function () {
    Route::resource('materiel', 'API\MaterielController');
    });

