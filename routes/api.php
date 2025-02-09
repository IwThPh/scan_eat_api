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
    //User Authentication (Token)
    Route::post('auth/revoke', 'AuthController@revoke');
    Route::post('auth/refresh', 'AuthController@refresh');

    //Product Related
    Route::get('product/{barcode}', 'ProductController@show')->where('barcode', '[0-9]+');
    Route::patch('product/{barcode}', 'ProductController@save')->where('barcode', '[0-9]+');
    Route::delete('product/{barcode}', 'ProductController@unsave')->where('barcode', '[0-9]+');

    //Allergen Related
    Route::patch('allergens', 'AllergenController@select');
    Route::post('allergens', 'AllergenController@index');

    //Diet Related
    Route::patch('diets', 'DietController@select');
    Route::post('diets', 'DietController@index');

    //Preference Related
    Route::get('preferences', 'PreferenceController@show');
    Route::patch('preferences', 'PreferenceController@update');
    Route::delete('preferences', 'PreferenceController@destroy');

    //User Related
    Route::post('user', 'UserController@show');
    Route::post('user/history', 'UserController@history');
    Route::post('user/saved', 'UserController@saved');
});

// Route::middleware('throttle:10,5')->group(function () {
    //Authentication Related (No Token).
    Route::post('auth/token', 'AuthController@token');
    Route::post('auth/register', 'AuthController@register');
// });

