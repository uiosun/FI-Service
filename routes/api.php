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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 用户
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('new-ver', 'CitySavedController@checkVersion');

Route::group(['middleware' => 'auth:api'], function() {
    // 城邦发展史
    Route::get('city-saved', 'CitySavedController@index');
    Route::post('city-saved', 'CitySavedController@store');
    Route::put('city-saved', 'CitySavedController@update');
});
