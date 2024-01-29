<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




//Administration

Route::prefix('admin')->namespace('admin')->group(function(){

    //Authentication

        Route::get('/login', 'LoginController@index')->name('login');
        Route::post('/login', 'LoginController@authenticate')->name('login');
        Route::get('/logout', 'LoginController@logout')->name('logout');

    //Authenticated

        Route::middleware('adminAuth')->group(function(){
            Route::get('/', 'MainController@index')->name('dashboard');
        });
});
