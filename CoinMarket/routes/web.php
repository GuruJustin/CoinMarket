<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get('/', [
    'uses'=>'App\Http\Controllers\UserController@index'
    ]);

Route::post('/login', [
    'uses'=>'App\Http\Controllers\UserController@userLogin'
    ]);

Route::get('/home', [
    'uses'=>'App\Http\Controllers\UserController@home'
    ]);

Route::post('/sendOtp', [
    'middleware' => 'checkSession',
    'uses'=>'App\Http\Controllers\UserController@sendOtp'
]);

Route::post('/verifyOtp', [
    'middleware' => 'checkSession',
    'uses'=>'App\Http\Controllers\UserController@verifyOtp'
]);

Route::get('/logout', [
    'uses'=>'App\Http\Controllers\UserController@logout'
    ]);	