<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

//Migration
Route::get('/migrate', function () {
    Artisan::call('migrate');
    dd('migrated!');
});
// Route::get('/seeder', function () {
//     Artisan::call('db:seed');
//     dd('Seeded!');
// });


// Website
Route::namespace('web')->group(function () {

    //Home
    Route::get('/', 'HomeController@index')->name('home');


    //Listing
    Route::prefix('stores')->group(function(){
        Route::get('/{type}', 'ListingController@index')->name('stores');
    });

    Route::prefix('store')->group(function(){
        Route::get('/{brand_slug}', 'ListingController@brand')->name('brand');
        Route::get('{cat_slug}/{brand_slug}', 'ListingController@category_brand')->name('category.brand');
    });
    Route::prefix('coupon')->group(function(){
        Route::get('/{id}', 'ListingController@show_coupon');
    });

    Route::prefix('category')->group(function(){
        Route::get('{cat_slug}', 'ListingController@category')->name('category');
        Route::get('{cat_slug}/{type}', 'ListingController@category_sub')->name('category.sub');
    });

    //Users
    Route::prefix('user')->group(function(){
        Route::post('create', 'UserController@create')->name('user.create');
        Route::post('login', 'UserController@login')->name('user.login');

        Route::get('logout', 'UserController@logout')->name('user.logout');

        Route::middleware('userAuth')->group(function(){

            Route::get('profile', 'UserController@profile')->name('user.profile');

            Route::get('claim-cashback', 'UserController@claimCashback')->name('user.claimCashback');

            Route::get('payment-history', 'UserController@paymenyHistory')->name('user.paymenyHistory');

            Route::get('referral-earn', 'UserController@referralEarn')->name('user.referralEarn');

            Route::get('withdraw-payment', 'UserController@withdrawPayment')->name('user.withdrawPayment');

            Route::get('settings', 'UserController@settings')->name('user.settings');
        });
    });

    //Blogs
    Route::prefix('blogs')->group(function(){

        Route::get('/', 'BlogController@index')->name('Blogs');
 
        Route::get('/{slug}', 'BlogController@detail')->name('blog.details');
    });





    //About-Us
    Route::get('/About-Us', 'HomeController@About_Us')->name('About_Us');

    //Sell-With-DCM
    Route::get('/Sell-With-DCM', 'HomeController@Sell_With_DCM')->name('Sell_With_DCM');

    //Store Products
    Route::get('/Store-Products', 'HomeController@Store_Products')->name('Store_Products');

    //Store Single Product
    Route::get('/Store-Single-Product', 'HomeController@Store_Single_Product')->name('Store_Single_Product');



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

            //offers
            Route::prefix('offers')->group(function () {
                Route::get('/{id}', 'OfferController@index')->name('admin.retailer.offer');
                Route::get('/load/{id}', 'OfferController@load')->name('admin.retailer.offer.load');
                Route::get('/search/{val}', 'OfferController@search_retailer');
                Route::post('/create', 'OfferController@create')->name('admin.retailer.offer.create');
                Route::get('/delete/{id}', 'OfferController@delete');
                Route::get('/edit/{id}', 'OfferController@edit');
                Route::post('/update', 'OfferController@update_coupon')->name('admin.retailer.offer.update');
            });

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
