<?php

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

use App\Http\Controllers\Firebase\DeviceController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addD', 'HomeController@add')->name('add');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/edit', 'ProfileController@edit')->name('edit');
Route::post('/profile', 'ProfileController@new')->name('profile');
Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

// Route::get('/dashboard', 'DeviceController@dashboard')->name('dashboard');
// Route::post('/add', 'DeviceController@index')->name('index');

Route::post('/add', [DeviceController::class, 'index']);

Route::post('/dashboard', [DeviceController::class, 'dashboard']);

Route::get('/test', function () {

    return view('test');
});


