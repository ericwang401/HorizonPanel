<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/packages', 'PackagesController@index')->name('packages');

Route::middleware(['auth'])->group(function () {
    Route::get('/client/dashboard', 'ClientAreaControllers\DashboardController@index')->name("client.dashboard"); // Not complete

    Route::get('/client/subscriptions', 'ClientAreaControllers\SubscriptionController@index')->name("client.subscriptions");
});
