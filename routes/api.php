<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/auth/signin', 'API\Auth\AuthController@login');

Route::get('/auth/verifyemail/{email}', 'API\Auth\AuthController@verifyEmail');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/auth/signout', 'API\Auth\AuthController@logout');
    Route::get('/auth/details', 'API\Auth\AuthController@details');
});