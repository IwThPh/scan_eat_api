<?php

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

Route::middleware('auth:api')->group(function () {
    Route::post('auth/revoke', 'AuthController@revoke');
    Route::post('auth/refresh', 'AuthController@refresh');
    Route::get('product/{barcode}', 'ProductController@show')->where('barcode', '[0-9]+');

    Route::post('allergens', 'AllergenController@select');
    Route::post('diets', 'DietController@select');
});

Route::middleware('throttle:10,5')->group(function () {
    Route::post('auth/token', 'AuthController@token');
    Route::post('auth/register', 'AuthController@register');
});

Route::get('allergens', 'AllergenController@index');
Route::get('diets', 'DietController@index');
