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
//Migration
Route::get('/migrate', function(){
    Artisan::call('migrate');
    dd('migrated!');
});
Route::get('/seeder', function(){
    Artisan::call('db:seed');
    dd('Seeded!');
});

Route::get('/', function () {
    return view('welcome');
});




//Administration

Route::prefix('admin')->namespace('admin')->group(function(){

    //Authentication
        Route::get('/login', 'LoginController@index')->name('admin.login');
        Route::post('/login', 'LoginController@authenticate');
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');

    //Authenticated
        Route::middleware('adminAuth')->group(function(){
            Route::get('/', 'MainController@index')->name('admin.dashboard');

            //Retailers
                Route::prefix('retailer')->group(function(){
                    Route::get('/', 'RetailerController@index')->name('admin.retailer');
                    Route::get('/load', 'RetailerController@load')->name('admin.retailer.load');
                    Route::post('/filter', 'RetailerController@retailers_filter')->name('admin.retailer.filter');
                    Route::post('/create', 'RetailerController@create')->name('admin.retailer.create');
                    Route::post('/update', 'RetailerController@update_retailer')->name('admin.retailer.update');
                    Route::get('/edit/{id}', 'RetailerController@edit');
                    Route::get('/delete/{id}', 'RetailerController@delete');

                    //Coupons
                        Route::prefix('coupon')->group(function(){
                            Route::get('/{id}', 'CouponController@index')->name('admin.retailer.coupon');
                            Route::get('/search/{val}', 'CouponController@search_retailer');
                        });

                    //Blogs
                        Route::prefix('blogs')->group(function(){
                            Route::get('/', 'RetailerBlogController@index')->name('admin.retailer.blog');
                        });
                });

            //Blogs
                Route::prefix('blogs')->group(function(){
                    Route::get('/', 'BlogController@index')->name('admin.blog');
                });

            //SEO Tools
                Route::prefix('seo')->group(function(){
                    Route::get('/meta', 'SeoController@meta')->name('admin.seo.meta');
                    Route::get('/snippet', 'SeoController@snippet')->name('admin.seo.snippet');
                });

            //Categories
                Route::prefix('categories')->group(function(){
                    Route::get('/', 'CategoryController@index')->name('admin.categories');
                    Route::get('/load', 'CategoryController@load')->name('admin.categories.load');
                    Route::post('/create', 'CategoryController@create')->name('admin.categories.create');
                    Route::get('/edit/{id}', 'CategoryController@edit');
                    Route::get('/delete/{id}', 'CategoryController@delete');
                });

            //Countries
                Route::prefix('countries')->group(function(){
                    Route::get('/', 'CountryController@index')->name('admin.countries');
                    Route::get('/load', 'CountryController@load')->name('admin.countries.load');
                    Route::post('/create', 'CountryController@create')->name('admin.countries.create');
                    Route::get('/edit/{id}', 'CountryController@edit');
                    Route::get('/delete/{id}', 'CountryController@delete');
                });

            //users
                Route::prefix('users')->group(function(){
                    Route::get('/', 'UserController@index')->name('admin.users');
                    Route::get('/load', 'UserController@load')->name('admin.users.load');
                    Route::post('/create', 'UserController@create')->name('admin.users.create');
                    Route::get('/edit/{id}', 'UserController@edit');
                    Route::post('/update', 'UserController@update_user')->name('admin.users.update');
                    Route::get('/delete/{id}', 'UserController@delete');
                    Route::get('/changeStatus/{id}/{status}', 'UserController@changeStatus');

                });
        });
});
