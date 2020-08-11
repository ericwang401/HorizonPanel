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

/*
scrapped idea
Route::get('/admin/{any}', function() {
    return view('admin.home');
})->where('any', '.*');
*/

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/store', 'PackagesController@index')->name('packages');

Route::get('/store/category/{id}', 'PackagesController@show')->name('packages.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/client/dashboard', 'ClientAreaControllers\DashboardController@index')->name('client.dashboard'); // Not complete

    Route::get('/client/subscriptions', 'ClientAreaControllers\SubscriptionController@index')->name('client.subscriptions');
});

Route::group(['middleware' => ['permission:view panel']], function () {

    Route::get('/admin', 'Admin\AdminDashboardController@index')->name('admin.dashboard');


    // Roles Component

    Route::resource('/admin/roles', 'Admin\RolesController', [
        'as' => 'admin'
    ]);


    // Payment Credentials Component

    Route::resource('/admin/gateways', 'Admin\GatewayCredentialsController', [
        'as' => 'admin'
    ]);

});