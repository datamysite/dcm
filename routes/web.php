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
// Route::get('/migrate', function () {
//     Artisan::call('migrate');
//     dd('migrated!');
// });
// Route::get('/seeder', function () {
//     Artisan::call('db:seed');
//     dd('Seeded!');
// });


// Website
Route::namespace('web')->group(function () {

    //Home
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/Home', 'HomeController@index')->name('home');

    //About-Us
    Route::get('/About-Us', 'HomeController@About_Us')->name('About_Us');

    //Sell-With-DCM
    Route::get('/Sell-With-DCM', 'HomeController@Sell_With_DCM')->name('Sell_With_DCM');

    //Store Products
    Route::get('/Store-Products', 'HomeController@Store_Products')->name('Store_Products');

    //Store Single Product
    Route::get('/Store-Single-Product', 'HomeController@Store_Single_Product')->name('Store_Single_Product');

    //Blogs 
    Route::get('/Blogs', 'HomeController@Blogs')->name('Blogs');

    //Single Blog Post 
    Route::get('/Single-Blog', 'HomeController@Single_Blog')->name('Single_Blog');

    //User Profile
    Route::get('/User-Profile', 'HomeController@User_Profile')->name('User_Profile');

    //User Claim Cashback
    Route::get('/Claim-Cashback', 'HomeController@Claim_Cashback')->name('Claim_Cashback');

    //User Payment History
    Route::get('/Payment-History', 'HomeController@Paymeny_History')->name('Paymeny_History');

    //User Referral Earn
    Route::get('/Referral-Earn', 'HomeController@Referral_Earn')->name('Referral_Earn');

    //User Withdraw Payment
    Route::get('/Withdraw-Payment', 'HomeController@Withdraw_Payment')->name('Withdraw_Payment');

    //User Settings
    Route::get('/User-Settings', 'HomeController@User_Settings')->name('User_Settings');

    //Categoires
    Route::get('/Categoires', 'HomeController@Categoires')->name('Categoires');

});




//Administration

Route::prefix('admin')->namespace('admin')->group(function () {

    //Authentication
    Route::get('/login', 'LoginController@index')->name('admin.login');
    Route::post('/login', 'LoginController@authenticate');
    Route::get('/logout', 'LoginController@logout')->name('admin.logout');

    //Authenticated
    Route::middleware('adminAuth')->group(function () {
        Route::get('/', 'MainController@index')->name('admin.dashboard');

        //Retailers
        Route::prefix('retailer')->group(function () {
            Route::get('/', 'RetailerController@index')->name('admin.retailer');
            Route::get('/load', 'RetailerController@load')->name('admin.retailer.load');
            Route::post('/filter', 'RetailerController@retailers_filter')->name('admin.retailer.filter');
            Route::post('/create', 'RetailerController@create')->name('admin.retailer.create');
            Route::post('/update', 'RetailerController@update_retailer')->name('admin.retailer.update');
            Route::get('/edit/{id}', 'RetailerController@edit');
            Route::get('/delete/{id}', 'RetailerController@delete');

            //Coupons
            Route::prefix('coupon')->group(function () {
                Route::get('/{id}', 'CouponController@index')->name('admin.retailer.coupon');
                Route::get('/load/{id}', 'CouponController@load')->name('admin.retailer.coupon.load');
                Route::get('/search/{val}', 'CouponController@search_retailer');
                Route::post('/create', 'CouponController@create')->name('admin.retailer.coupon.create');
                Route::get('/delete/{id}', 'CouponController@delete');
                Route::get('/edit/{id}', 'CouponController@edit');
                Route::post('/update', 'CouponController@update_coupon')->name('admin.retailer.coupon.update');
            });

            //Blogs
            Route::prefix('blogs')->group(function () {
                Route::get('/{id}', 'RetailerBlogController@index')->name('admin.retailer.blog');
                Route::get('/load/{id}', 'RetailerBlogController@load')->name('admin.retailer.blog.load');
                Route::get('/search/{val}', 'RetailerBlogController@search_retailer');
                Route::post('/create', 'RetailerBlogController@create')->name('admin.retailer.blog.create');
                Route::get('/delete/{id}', 'RetailerBlogController@delete');
                Route::get('/edit/{id}', 'RetailerBlogController@edit');
                Route::post('/update', 'RetailerBlogController@update_blog')->name('admin.retailer.blog.update');
            });
        });

        //Blogs
        Route::prefix('blogs')->group(function () {
            Route::get('/', 'BlogController@index')->name('admin.blog');
            Route::get('/load', 'BlogController@load')->name('admin.blog.load');
            Route::get('/search/{val}', 'BlogController@search');
            Route::post('/create', 'BlogController@create')->name('admin.blog.create');
            Route::get('/delete/{id}', 'BlogController@delete');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update', 'BlogController@update_blog')->name('admin.blog.update');
        });

        //SEO Tools
        Route::prefix('seo')->group(function () {
            Route::prefix('meta')->group(function () {
                Route::get('/', 'SeoController@meta')->name('admin.seo.meta');
                Route::post('/check', 'SeoController@meta_check')->name('admin.seo.meta.check');
                Route::post('/update', 'SeoController@meta_update')->name('admin.seo.meta.update');
            });
            Route::prefix('snippet')->group(function () {
                Route::get('/', 'SeoController@snippet')->name('admin.seo.snippet');
                Route::get('/load', 'SeoController@snippet_load')->name('admin.seo.snippet.load');
                Route::post('/create', 'SeoController@snippet_create')->name('admin.seo.snippet.create');
                Route::get('/delete/{id}', 'SeoController@snippet_delete');
                Route::get('/edit/{id}', 'SeoController@snippet_edit');
                Route::post('/update', 'SeoController@snippet_update')->name('admin.seo.snippet.update');
            });
        });

        //Categories
        Route::prefix('categories')->group(function () {
            Route::get('/', 'CategoryController@index')->name('admin.categories');
            Route::get('/load', 'CategoryController@load')->name('admin.categories.load');
            Route::post('/create', 'CategoryController@create')->name('admin.categories.create');
            Route::get('/edit/{id}', 'CategoryController@edit');
            Route::get('/delete/{id}', 'CategoryController@delete');
        });

        //Countries
        Route::prefix('countries')->group(function () {
            Route::get('/', 'CountryController@index')->name('admin.countries');
            Route::get('/load', 'CountryController@load')->name('admin.countries.load');
            Route::post('/create', 'CountryController@create')->name('admin.countries.create');
            Route::get('/edit/{id}', 'CountryController@edit');
            Route::get('/delete/{id}', 'CountryController@delete');
        });

        //users
        Route::prefix('users')->group(function () {
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
