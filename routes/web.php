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

Route::get('/admin/', function() {
    return view('admin.home');
});

/*
scraped idea
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

    Route::get('/admin/roles', 'Admin\RoleController@index')->name('admin.roles');

    Route::get('/admin/roles/create', 'Admin\RoleController@create')->name('admin.create_role');

    Route::post('/admin/roles', 'Admin\RoleController@store')->name('admin.store_role');

    Route::get('/admin/roles/{role}', 'Admin\RoleController@show')->name('admin.show_role');

    Route::delete('/admin/roles/{role}', 'Admin\RoleController@destroy')->name('admin.destroy_role');

});