<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Commands
|--------------------------------------------------------------------------
|
*/

// Update Sitemap
Route::get('/update-sitemap', function () {
    Artisan::call('app:generate-sitemap');
    dd('Sitemap Updated!');
});


//Migration
Route::get('/migrate', function () {
    Artisan::call('migrate');
    dd('migrated!');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/


// Website
    Route::get('/', 'web\RegionController@get_lang');

    //Region
    Route::group([
                'namespace' => 'web',
                'prefix' => '{locale}',
                'where' => ['locale' => '[a-zA-Z]{2}'],
                'middleware' => ['setLocale','amp_validator'],

            ], function () {
        Route::get('/', 'RegionController@index');
        Route::get('/region/{name}', 'RegionController@set_region')->name('setRegion');

        Route::prefix('{region}')->group(function(){
            //Home
            Route::get('/', 'HomeController@index')->name('home');
                //Includes Lazy Load
                Route::prefix('includes')->group(function(){
                    Route::get('getFooter', 'HomeController@get_footer');
                });
                //Home Lazy Load
                Route::prefix('home')->group(function(){
                    Route::get('getStates/{type}', 'HomeController@get_states');
                    Route::get('getcategories', 'HomeController@get_categories');
                    Route::get('getOnlineStores', 'HomeController@get_online_store');
                    Route::get('getRetailStores', 'HomeController@get_retail_store');
                    Route::get('getAllStores', 'HomeController@get_all_store');
                });

            Route::get('/search/{value}', 'HomeController@search');

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
                Route::get('/grabDeal/{id}', 'ListingController@coupon_grab_deal');
            });
            Route::prefix('offers')->group(function(){
                Route::get('/{id}', 'ListingController@show_offer');
                Route::get('/whatsapp/{id}', 'ListingController@redirect_whatsapp');
                Route::get('/qrcode/{slug}/{id}', 'ListingController@generate_qrcode')->name('offers.qrcode');
                Route::post('/qrcode/mark', 'ListingController@qrcode_markasused')->name('offers.qrcode.mark');
                Route::get('/redeem-pdf/{id}', 'ListingController@redeem_pdf')->name('offers.redeemPDF');
            });

            Route::prefix('category')->group(function(){
                Route::get('{cat_slug}', 'ListingController@category')->name('category');
                Route::get('{cat_slug}/{type}', 'ListingController@category_sub')->name('category.sub');
            });

            //Blogs
            Route::prefix('blogs')->middleware('BlogAccess')->group(function(){

                Route::get('/', 'BlogController@index')->name('Blogs');
         
                Route::get('/{slug}', 'BlogController@detail')->name('blog.details');
            });

            //About-Us
            Route::get('/about-Us', 'HomeController@About_Us')->name('About_Us');


            //About-Us
            Route::get('/contact-Us', 'HomeController@Contact_Us')->name('Contact_Us');
            Route::post('/contact-Us', 'HomeController@Contact_Us_submit')->name('Contact_Us');

            //Sell-With-DCM
            Route::get('/sell-with-dcm', 'HomeController@Sell_With_DCM')->name('Sell_With_DCM');
            Route::post('/lead-generation', 'HomeController@lead_generation')->name('lead.generation');

            
            Route::get('/faqs', 'HomeController@FAQS')->name('FAQS');

            //Terms
            Route::get('/terms', 'HomeController@Terms')->name('Terms');

            //Privacy-Policy
            Route::get('/privacy-policy', 'HomeController@Privacy_Policy')->name('Privacy_Policy');

            //Anti-Spam
            Route::get('/anti-spam', 'HomeController@Anti_Spam')->name('Anti_Spam');

            //test comment//


        });

        //Users
        Route::prefix('user')->group(function(){
            Route::post('create', 'UserController@create')->name('user.create');
            Route::post('login', 'UserController@login')->name('user.login');

            Route::post('forgotPassword', 'UserController@forgotPassword')->name('user.forgotPassword');
            Route::get('resetPassword/{id}/{email}', 'UserController@resetPassword')->name('user.resetPassword');
            Route::post('updatePassword', 'UserController@updatePassword')->name('user.updatePassword');

            Route::get('logout', 'UserController@logout')->name('user.logout');

            Route::get('/google', 'GoogleLoginController@redirectToGoogle')->name('auth.google');
            Route::get('/google/callback', 'GoogleLoginController@handleGoogleCallback');

            Route::get('/facebook', 'FacebookLoginController@redirectToFacebook')->name('auth.facebook');
            Route::get('/facebook/callback', 'FacebookLoginController@handleFacebookCallback');

            Route::get('referral/{id}/{email}', 'UserController@referral_link')->name('user.referral.link');

            Route::middleware('userAuth')->group(function(){

                Route::get('profile', 'UserController@profile')->name('user.profile');
                Route::post('verify_email', 'UserController@verify_email')->name('user.verify_email');

                Route::prefix('claim-cashback')->group(function(){
                    Route::get('/', 'UserController@claimCashback')->name('user.claimCashback');
                    Route::post('/request', 'UserController@claimCashbackRequest')->name('user.claimCashback.request');
                });

                Route::get('payment-history', 'UserController@paymenyHistory')->name('user.paymenyHistory');

                Route::get('referral-earn', 'UserController@referralEarn')->name('user.referralEarn');

                Route::get('withdraw-payment', 'UserController@withdrawPayment')->name('user.withdrawPayment');

                Route::prefix('settings')->group(function(){
                    Route::get('/', 'UserController@settings')->name('user.settings');
                    Route::post('/update', 'UserController@settings_update')->name('user.settings.update');
                });
            });
        });

        //Careers
        Route::prefix('careers/vacancies')->group(function () {
            Route::get('/', 'CareerController@index')->name('careers');
            Route::get('/{id}', 'CareerController@details')->name('careers.job-details');
            Route::post('/apply', 'CareerController@apply')->name('careers.apply');
        });

        //Newsletter
        Route::prefix('newsletter')->group(function(){
            Route::post('subscribe', 'NewsletterController@subscribe')->name('newsletter.subscribe');
            Route::post('amp/subscribe', 'NewsletterController@subscribe_amp')->name('newsletter.subscribe.amp');
        });

    });





//Administration

Route::prefix('seller/panel')->namespace('seller')->group(function () {

    //Authentication
    Route::get('/login', 'LoginController@index')->name('seller.login');
    Route::post('/login', 'LoginController@authenticate');
    Route::get('/logout', 'LoginController@logout')->name('seller.logout');

    //Authenticated
    Route::middleware('sellerAuth')->group(function () {
        Route::get('/', 'MainController@index')->name('seller.dashboard');
        Route::post('/filter', 'MainController@dashboard_filter')->name('seller.filter');

        //Export
        Route::prefix('export')->group(function(){
            Route::post('/', 'ExportController@index')->name('seller.export');
        });

    });
});


//Administration

Route::prefix('admin/panel')->namespace('admin')->group(function () {

    ////Translation////
    Route::post('/translate', 'CmsController@translate', 'translate')->name('translate');
    Route::post('/multi-translate', 'CmsController@multi_translate', 'multi_translate')->name('multi-translate');

    //Authentication
    Route::get('/login', 'LoginController@index')->name('admin.login');
    Route::post('/login', 'LoginController@authenticate');
    Route::get('/logout', 'LoginController@logout')->name('admin.logout');

    //Authenticated
    Route::middleware('adminAuth')->group(function () {
        Route::get('/', 'MainController@index')->name('admin.dashboard');
        //Dashboard
        Route::prefix('dashboard')->group(function(){
            Route::get('/widgets', 'MainController@get_widgets')->name('admin.dashboard.get_widgets');
            Route::get('/recentActivities', 'MainController@get_recent_activities')->name('admin.dashboard.get_recent_activities');
        });


        //Retailers
        Route::prefix('retailer')->group(function () {
            Route::get('/', 'RetailerController@index')->name('admin.retailer');
            Route::get('/load', 'RetailerController@load')->name('admin.retailer.load');
            Route::post('/filter', 'RetailerController@retailers_filter')->name('admin.retailer.filter');
            Route::post('/create', 'RetailerController@create')->name('admin.retailer.create');
            Route::post('/update', 'RetailerController@update_retailer')->name('admin.retailer.update');
            Route::get('/edit/{id}', 'RetailerController@edit');
            Route::get('/delete/{id}', 'RetailerController@delete');

            //Seller Panel
            Route::prefix('sellerPanel')->group(function(){
                Route::post('/create', 'RetailerController@create_seller_panel')->name('admin.retailer.sellerpanel.create');
            });

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

        //Careers
         Route::prefix('careers')->group(function () {
         
            Route::get('/', 'CareerController@index')->name('admin.careers');
            Route::get('/applied', 'CareerController@applied')->name('admin.careers.applied');
            Route::get('/load', 'CareerController@load')->name('admin.careers.load');
            Route::get('/load_jobs', 'CareerController@load_jobs')->name('admin.careers.load_jobs');
            Route::post('/create', 'CareerController@create')->name('admin.careers.create');
            Route::get('/edit/{id}', 'CareerController@edit');
            Route::get('/details/{id}', 'CareerController@details')->name('admin.careers.details');
            
            Route::get('/delete/{id}', 'CareerController@delete');
            Route::get('/deleteAplicant/{id}', 'CareerController@deleteAplicant');
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


        //Website Users
        Route::prefix('web/users')->group(function () {
            Route::get('/', 'WebUserController@index')->name('admin.webUsers');
            Route::get('/load', 'WebUserController@load')->name('admin.webUsers.load');
            Route::post('/filter', 'WebUserController@user_filter')->name('admin.webUsers.filter');
            Route::post('/export', 'WebUserController@user_export')->name('admin.webUsers.export');
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

        //States
        Route::prefix('states')->group(function () {
            Route::get('/load', 'StateController@load')->name('admin.states.load');
            Route::post('/create', 'StateController@create')->name('admin.states.create');
            Route::get('/edit/{id}', 'StateController@edit');
            Route::get('/delete/{id}', 'StateController@delete');
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

        //Newsletter
        Route::prefix('newsletter')->group(function () {
            Route::get('/', 'NewsletterController@index')->name('admin.newsletter');
            Route::get('/load', 'NewsletterController@load')->name('admin.newsletter.load');
            Route::post('/filter', 'NewsletterController@user_filter')->name('admin.newsletter.filter');
            Route::post('/export', 'NewsletterController@user_export')->name('admin.newsletter.export');
        });

        
        //Home :: Slider Section
        Route::prefix('home')->group(function () {

            Route::prefix('slider')->group(function () {

                Route::get('/', 'CmsController@slider')->name('admin.home.slider');
                Route::post('/create', 'CmsController@create')->name('admin.home.slider.create');
                Route::get('/load', 'CmsController@load')->name('admin.home.slider.load');
                Route::get('/edit/{id}', 'CmsController@edit');
                Route::get('/delete/{id}', 'CmsController@delete');
            });

            Route::prefix('stores')->group(function () {

            
                Route::get('/', 'CmsController@stores')->name('admin.home.stores');
                Route::get('/get-retailers', 'CmsController@getRetailers')->name('admin.home.stores.get-retailers');
                Route::post('/create', 'CmsController@create_stores')->name('admin.home.stores.create');
                Route::get('/load', 'CmsController@load_stores')->name('admin.home.stores.load');
                Route::post('/filter', 'CmsController@stores_filter')->name('admin.home.stores.filter');
                Route::get('/edit/{id}', 'CmsController@edit_store');
                Route::get('/delete/{id}', 'CmsController@delete_store');
            });
        });

        //About-Us Content
        Route::prefix('about')->group(function () {
            Route::get('/', 'CmsController@about')->name('admin.about');
            Route::get('/load', 'CmsController@load_about')->name('admin.about.load');
            Route::post('/create', 'CmsController@create_about')->name('admin.about.create');
            Route::get('/edit/{id}', 'CmsController@edit_about');
            Route::get('/delete/{id}', 'CmsController@delete_about');
        });

        //Contact-Us
        Route::prefix('contact')->group(function () {
            Route::get('/', 'CmsController@contact')->name('admin.contact');
            Route::get('/load', 'CmsController@load_contact')->name('admin.contact.load');
            Route::post('/create', 'CmsController@create_contact')->name('admin.contact.create');
            Route::get('/edit/{id}', 'CmsController@edit_contact');
            Route::get('/delete/{id}', 'CmsController@delete_contact');
        });

        //Footer Content
        Route::prefix('footer')->group(function () {
            Route::get('/', 'CmsController@footer')->name('admin.footer');
            Route::get('/load', 'CmsController@load_footer')->name('admin.footer.load');
            Route::post('/create', 'CmsController@create_footer')->name('admin.footer.create');
            Route::get('/edit/{id}', 'CmsController@edit_footer');
            Route::get('/delete/{id}', 'CmsController@delete_footer');
            Route::post('/copyright/save', 'CmsController@footer_copyright_save')->name('admin.footer.copyright.save');
        });
    });
});
