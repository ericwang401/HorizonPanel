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
    Route::get('/admin/roles', 'Admin\RolesController@index')->name('admin.roles');

    Route::get('/admin/roles/create', 'Admin\RolesController@create')->name('admin.roles.create');

    Route::post('/admin/roles', 'Admin\RolesController@store')->name('admin.roles.store');

    Route::get('/admin/roles/{role}/edit', 'Admin\RolesController@edit')->name('admin.roles.edit');

    Route::put('/admin/roles/{role}', 'Admin\RolesController@update')->name('admin.roles.update');

    Route::delete('/admin/roles/{role}', 'Admin\RolesController@destroy')->name('admin.roles.destroy');


    // Payment Credentials Component
    Route::get('/admin/gateways', 'Admin\GatewayCredentialsController@index')->name('admin.gateways');

    Route::get('/admin/gateways/create', 'Admin\GatewayCredentialsController@create')->name('admin.gateways.create');

    Route::post('/admin/gateways/', 'Admin\GatewayCredentialsController@store')->name('admin.gateways.store');

    Route::get('/admin/gateways/{gateway}/edit', 'Admin\GatewayCredentialsController@edit')->name('admin.gateways.edit');

    Route::delete('/admin/gateways/{gateway}', 'Admin\GatewayCredentialsController@destroy')->name('admin.gateways.destroy');

});