<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');

Route::middleware('jwt.auth')->get('/users', function (Request $request) {
    return auth()->user();
});
// Protected with APIToken Middleware
Route::middleware('APIToken')->group(function () {
    Route::get('interventions/{barcode}','API\InterventionController@show'); //check if the code bar exist
    Route::post('interventions','API\InterventionController@store');
    Route::get('sessionetat/{sessioncode}','API\SessionController@show');
    Route::post('sessionetat/','API\SessionController@update');
    
  });

/*
Route::match(['get', 'post'], 'interventions', function (){
    Route::resource('interventions','API\InterventionController');
}); */
/*Route::group(['middleware' => 'web'], function () {
Route::resource('materiel', 'API\MaterielController');
});*/