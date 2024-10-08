<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Commands
|--------------------------------------------------------------------------
|
*/

//Newsletter mail
Route::get('/newsletter-mail-1', function(){
    Mail::send('web.emailers.lifebalance.template1', array(), function($message) {
        $message->to('waseem@datamysite.com', 'Satish')->subject
            ('Test mail Life Balance 1');
        $message->from('info@dealsandcouponsmena.com','DCM');
    });

    return true;
});
Route::get('/newsletter-mail-2', function(){
    Mail::send('web.emailers.lifebalance.template2', array(), function($message) {
        $message->to('waseem@datamysite.com', 'Satish')->subject
            ('Test mail Life Balance 2');
        $message->from('info@dealsandcouponsmena.com','DCM');
    });

    return true;
});


// Update Sitemap
Route::get('/update-sitemap', function () {
    Artisan::call('app:generate-sitemap');
    dd('Sitemap Updated!');
});


//Migration
Route::get('/migrate', function () {
    Artisan::call('migrate');
    //Artisan::call('migrate', ['--force' => true ]);
    dd('migrated!');
});

//Create New Permission
// Route::get('create-permission', function(){
//     $role = Role::find(4);
//     $role2 = Role::find(5);
//     $permission = Permission::create(['name' => 'SEO FAQ modify', 'guard_name' => 'admin']);
//     $permission->assignRole($role);
//     $permission->assignRole($role2);

//     dd('created');
// });
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
    'middleware' => ['setLocale', 'amp_validator'],

], function () {
    //Route::get('/', 'RegionController@index');
    Route::get('/region/{name}', 'RegionController@set_region')->name('setRegion');
    Route::get('/getLocation', 'RegionController@get_location');


    /* ----------- States Routes -----*/


    //Home
    Route::get('/', 'HomeController@index')->name('home');
    //404
    Route::get('/404', 'HomeController@not_found')->name('not_found');

    //Includes Lazy Load
    Route::prefix('includes')->group(function () {
        Route::get('getFooter', 'HomeController@get_footer');
    });
    //Home Lazy Load
    Route::prefix('home')->group(function () {
        Route::get('getStates/{type}', 'HomeController@get_states');
        Route::get('getcategories', 'HomeController@get_categories');
        Route::get('getOnlineStores', 'HomeController@get_online_store');
        Route::get('getRetailStores', 'HomeController@get_retail_store');
        Route::get('getAllStores', 'HomeController@get_all_store');
    });

    Route::get('/search/{value}', 'HomeController@search');

    //Listing

    Route::get('/category', 'ListingController@all_categories');

    Route::prefix('stores')->group(function () {
        Route::get('/', 'ListingController@all_stores');
        Route::get('/{type}', 'ListingController@index')->name('stores');
    });

    //Store
    //Route::get('{cat_slug}/{brand_slug}', 'ListingController@category_brand')->name('category.brand');

    Route::prefix('coupon')->group(function () {
        Route::get('/{id}', 'ListingController@show_coupon');
        Route::get('/grabDeal/{id}', 'ListingController@coupon_grab_deal');
    });
    Route::prefix('offers')->group(function () {
        Route::get('/{id}', 'ListingController@show_offer');
        Route::get('/whatsapp/{id}', 'ListingController@redirect_whatsapp');
        Route::get('/qrcode/{slug}/{id}', 'ListingController@generate_qrcode')->name('offers.qrcode');
        Route::post('/qrcode/mark', 'ListingController@qrcode_markasused')->name('offers.qrcode.mark');
        Route::get('/redeem-pdf/{id}', 'ListingController@redeem_pdf')->name('offers.redeemPDF');
    });

    //Route::get('{cat_slug}/{type}', 'ListingController@category_sub')->name('category.sub');

    //Blogs
    Route::prefix('blogs')->middleware('BlogAccess')->group(function () {

        Route::get('/', 'BlogController@index')->name('Blogs');

        Route::get('/{slug}', 'BlogController@detail')->name('blog.details');

        Route::get('/author/{slug}', 'BlogController@author')->name('blog.author');

        Route::get('/categories/{slug}', 'BlogController@categories')->name('blog.categories');
    });

    //Write a Review
    Route::post('/write_review', 'HomeController@write_review')->name('write_review');
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

    //Extension Page //
    Route::get('/welcome', 'ExtController@welcomePage')->name('welcomePage');

    //Claim cashback LandingPage
    Route::get('/claim/cashback', 'HomeController@claim_cashback')->name('claim_cashback');

    //Cancel Welcome Message Session
    Route::get('/cancelWelcomeMsg', 'HomeController@cancelWelcomeMsg')->name('cancelWelcomeMsg');


    /* ----------- States Routes -----*/

    //Users
    Route::prefix('user')->group(function () {
        Route::post('create', 'UserController@create')->name('user.create');
        Route::post('create_from_ext', 'UserController@create_from_ext')->name('user.create_from_ext');

        Route::post('login', 'UserController@login')->name('user.login');
        Route::post('login_from_ext', 'UserController@login_from_ext')->name('user.login_from_ext');

        Route::post('forgotPassword', 'UserController@forgotPassword')->name('user.forgotPassword');
        Route::get('resetPassword/{id}/{email}', 'UserController@resetPassword')->name('user.resetPassword');
        Route::post('updatePassword', 'UserController@updatePassword')->name('user.updatePassword');

        Route::get('logout', 'UserController@logout')->name('user.logout');

        Route::get('/google', 'GoogleLoginController@redirectToGoogle')->name('auth.google');
        Route::get('/google/callback', 'GoogleLoginController@handleGoogleCallback');

        Route::get('/facebook', 'FacebookLoginController@redirectToFacebook')->name('auth.facebook');
        Route::get('/facebook/callback', 'FacebookLoginController@handleFacebookCallback');

        Route::get('referral/{id}/{email}', 'UserController@referral_link')->name('user.referral.link');

        Route::middleware('userAuth')->group(function () {

            // Route::get('profile', 'UserController@profile')->name('user.profile');
            Route::post('verify_email', 'UserController@verify_email')->name('user.verify_email');

            Route::prefix('claim-cashback')->group(function () {
                Route::get('/', 'UserController@claimCashback')->name('user.claimCashback');
                Route::post('/request', 'UserController@claimCashbackRequest')->name('user.claimCashback.request');
            });

            Route::get('payment-history', 'UserController@paymenyHistory')->name('user.paymenyHistory');

            Route::get('referral-earn', 'UserController@referralEarn')->name('user.referralEarn');

            Route::get('withdraw-payment', 'UserController@withdrawPayment')->name('user.withdrawPayment');
            Route::post('withdraw-payment', 'UserController@withdrawPaymentSubmit')->name('user.withdrawPayment.submit');

            Route::get('dashboard', 'UserController@dashboard')->name('user.dashboard');
            Route::get('transaction-history', 'UserController@transactionHistory')->name('user.transactionHistory');

            Route::prefix('settings')->group(function () {
                Route::get('/', 'UserController@settings')->name('user.settings');
                Route::post('/update', 'UserController@settings_update')->name('user.settings.update');
                Route::post('/bank_details', 'UserController@bank_details')->name('user.settings.bank_details');
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
    Route::prefix('newsletter')->group(function () {
        Route::post('subscribe', 'NewsletterController@subscribe')->name('newsletter.subscribe');
        Route::post('amp/subscribe', 'NewsletterController@subscribe_amp')->name('newsletter.subscribe.amp');
    });

    //Chrome Extension
    Route::prefix('ext')->group(function () {
        Route::get('open/{url}', 'ExtController@index')->name('ext.open');
        Route::get('login/{url}', 'ExtController@login')->name('ext.login');
    });
});

/* --------- Clean routes -----------------*/

Route::group([
    'namespace' => 'web',
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => ['setLocale', 'amp_validator'],

], function () {

    Route::get('/{wildcard}', function ($lang, $wildcard, Request $request) {
        $cat_slug = str_replace('-', ' ', $wildcard);
        $cat_slug = str_replace('and', '&', $cat_slug);
        $cat_slug = ucwords($cat_slug);

        $is_category = App\Models\Categories::where('name', $cat_slug)->first();
        //$is_brand = App\Models\Retailers::where('slug', $wildcard)->where('status', '1')->first();
        $is_brand = App\Models\Retailers::where('slug', $wildcard)->first();
        //dd($is_category);
        if (null !== $is_category) {
            $controller = app()->make('App\Http\Controllers\web\ListingController');
            return $controller->callAction('category', ['cat_slug' => $wildcard, 'request' => $request->all()]);
            //return redirect()->action('web\ListingController@category', ['cat_slug' => $wildcard]);
        } else if (null !== $is_brand) {
            $controller = app()->make('App\Http\Controllers\web\ListingController');
            return $controller->callAction('brand', ['brand_slug' => $wildcard]);
            //return redirect()->action('web\ListingController@brand', ['brand_slug' => $wildcard]);
        }
    });

    Route::get('/{wildcard}/{wildcard2}', function ($lang, $wildcard, $wildcard2, Request $request) {
        $cat_slug = str_replace('-', ' ', $wildcard);
        $cat_slug = str_replace('and', '&', $cat_slug);
        $cat_slug = ucwords($cat_slug);

       // $is_brand = App\Models\Retailers::where('slug', $wildcard2)->where('status', '1')->first();
       $is_brand = App\Models\Retailers::where('slug', $wildcard2)->first();
       $is_branch = App\Models\RetailerBranch::where('name', $wildcard2)->first();
        //dd($is_category);
        if ($wildcard2 == 'online' || $wildcard2 == 'retail') {
            $controller = app()->make('App\Http\Controllers\web\ListingController');
            return $controller->callAction('category_sub', ['cat_slug' => $wildcard, 'type' => $wildcard2, 'request' => $request->all()]);
            //return redirect()->action('web\ListingController@category', ['cat_slug' => $wildcard]);
        } else if (null !== $is_brand) {
            $controller = app()->make('App\Http\Controllers\web\ListingController');
            return $controller->callAction('category_brand', ['cat_slug' => $wildcard, 'brand_slug' => $wildcard2]);
            //return redirect()->action('web\ListingController@brand', ['brand_slug' => $wildcard]);
        } else if (null !== $is_branch) {
            $controller = app()->make('App\Http\Controllers\web\ListingController');
            return $controller->callAction('branch_branch', ['branch_name' => $wildcard2, 'brand_slug' => $wildcard]);
            //return redirect()->action('web\ListingController@brand', ['brand_slug' => $wildcard]);
        }
    });
});
/* --------- Clean routes -----------------*/






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
        Route::prefix('export')->group(function () {
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
        Route::prefix('dashboard')->group(function () {
            Route::get('/widgets', 'MainController@get_widgets')->name('admin.dashboard.get_widgets');
            Route::get('/recentActivities', 'MainController@get_recent_activities')->name('admin.dashboard.get_recent_activities');
        });


        //Retailers
        Route::prefix('retailer')->middleware('auth:admin', 'permission:Retailer view')->group(function () {
            Route::get('/', 'RetailerController@index')->name('admin.retailer');
            Route::get('/load', 'RetailerController@load')->name('admin.retailer.load');
            Route::post('/filter', 'RetailerController@retailers_filter')->name('admin.retailer.filter');
            Route::post('/create', 'RetailerController@create')->middleware('auth:admin', 'permission:Retailer add')->name('admin.retailer.create');
            Route::post('/update', 'RetailerController@update_retailer')->middleware('auth:admin', 'permission:Retailer edit')->name('admin.retailer.update');
            Route::get('/edit/{id}', 'RetailerController@edit')->middleware('auth:admin', 'permission:Retailer edit');
            Route::get('/delete/{id}', 'RetailerController@delete')->middleware('auth:admin', 'permission:Retailer delete');

            //Seller Panel
            Route::prefix('sellerPanel')->middleware('auth:admin', 'permission:Retailer edit')->group(function () {
                Route::post('/create', 'RetailerController@create_seller_panel')->name('admin.retailer.sellerpanel.create');
            });

            //Branch
            Route::prefix('branch')->group(function () {
                Route::get('/{id}', 'RetailerBranchController@index')->name('admin.retailer.branch');
                Route::get('/load/{id}', 'RetailerBranchController@load')->name('admin.retailer.branch.load');
                Route::get('/search/{val}', 'RetailerBranchController@search_retailer');
                Route::post('/create', 'RetailerBranchController@create')->name('admin.retailer.branch.create');
                Route::get('/delete/{id}', 'RetailerBranchController@delete');
                Route::get('/edit/{id}', 'RetailerBranchController@edit');
                Route::post('/update', 'RetailerBranchController@update_branch')->name('admin.retailer.branch.update');

                //FAQ
                Route::prefix('faqs')->group(function(){
                    Route::get('/{id}', 'BranchFAQController@index')->name('admin.retailer.branch.faq');
                    Route::get('/load/{id}', 'BranchFAQController@load')->name('admin.retailer.branch.faq.load');
                    Route::post('/create', 'BranchFAQController@create')->name('admin.retailer.branch.faq.create');
                });

                //Blogs
                Route::prefix('blogs')->middleware('auth:admin', 'permission:Retailer blogs view')->group(function () {
                    Route::get('/{id}', 'RetailerBranchBlogController@index')->name('admin.retailer.branch.blog');
                    Route::get('/load/{id}', 'RetailerBranchBlogController@load')->name('admin.retailer.branch.blog.load');
                    Route::post('/create', 'RetailerBranchBlogController@create')->middleware('auth:admin', 'permission:Retailer blogs add')->name('admin.retailer.branch.blog.create');
                });
            });

            //offers
            Route::prefix('offers')->middleware('auth:admin', 'permission:Retailer offer view')->group(function () {
                Route::get('/{id}', 'OfferController@index')->name('admin.retailer.offer');
                Route::get('/load/{id}', 'OfferController@load')->name('admin.retailer.offer.load');
                Route::get('/search/{val}', 'OfferController@search_retailer');
                Route::post('/create', 'OfferController@create')->middleware('auth:admin', 'permission:Retailer offer add')->name('admin.retailer.offer.create');
                Route::get('/delete/{id}', 'OfferController@delete')->middleware('auth:admin', 'permission:Retailer offer delete');
                Route::get('/edit/{id}', 'OfferController@edit')->middleware('auth:admin', 'permission:Retailer offer edit');
                Route::post('/update', 'OfferController@update_coupon')->middleware('auth:admin', 'permission:Retailer offer edit')->name('admin.retailer.offer.update');
            });

            //Coupons
            Route::prefix('coupon')->middleware('auth:admin', 'permission:Retailer coupon view')->group(function () {
                Route::get('/{id}', 'CouponController@index')->name('admin.retailer.coupon');
                Route::get('/load/{id}', 'CouponController@load')->name('admin.retailer.coupon.load');
                Route::get('/search/{val}', 'CouponController@search_retailer');
                Route::post('/create', 'CouponController@create')->middleware('auth:admin', 'permission:Retailer coupon add')->name('admin.retailer.coupon.create');
                Route::get('/delete/{id}', 'CouponController@delete')->middleware('auth:admin', 'permission:Retailer coupon delete');
                Route::get('/edit/{id}', 'CouponController@edit')->middleware('auth:admin', 'permission:Retailer coupon edit');
                Route::post('/update', 'CouponController@update_coupon')->middleware('auth:admin', 'permission:Retailer coupon edit')->name('admin.retailer.coupon.update');
            });

            //Blogs
            Route::prefix('blogs')->middleware('auth:admin', 'permission:Retailer blogs view')->group(function () {
                Route::get('/{id}', 'RetailerBlogController@index')->name('admin.retailer.blog');
                Route::get('/load/{id}', 'RetailerBlogController@load')->name('admin.retailer.blog.load');
                Route::get('/search/{val}', 'RetailerBlogController@search_retailer');
                Route::post('/create', 'RetailerBlogController@create')->middleware('auth:admin', 'permission:Retailer blogs add')->name('admin.retailer.blog.create');
                Route::get('/delete/{id}', 'RetailerBlogController@delete')->middleware('auth:admin', 'permission:Retailer blogs delete');
                Route::get('/edit/{id}', 'RetailerBlogController@edit')->middleware('auth:admin', 'permission:Retailer blogs edit');
                Route::post('/update', 'RetailerBlogController@update_blog')->middleware('auth:admin', 'permission:Retailer blogs edit')->name('admin.retailer.blog.update');
            });
            //FAQs
            //Add Retailers FAQs Permission if Needed //
            Route::get('/{id}', 'FaqController@Retailer_FAQs')->name('admin.retailer.faq');
            Route::post('/createRetailerFAQ', 'FaqController@createRetailerFAQ')->name('admin.retailer.faq.create');
            Route::get('/loadRetailerFAQ/{id}', 'FaqController@loadRetailerFAQ')->name('admin.retailer.faq.load');
            Route::get('/faq/editRetailerFAQ/{id}', 'FaqController@editRetailerFAQ');
            Route::post('/faq/updateRetailerFAQ', 'FaqController@updateRetailerFAQ')->name('admin.retailer.faq.update');
            Route::get('/faq/delete/{id}', 'FaqController@deleteFAQ');
        });

        //Blogs
        Route::prefix('blogs')->middleware('auth:admin', 'permission:Blogs view')->group(function () {

            Route::get('/', 'BlogController@index')->name('admin.blog');
            Route::get('/load', 'BlogController@load')->name('admin.blog.load');
            Route::get('/search/{val}', 'BlogController@search');
            Route::post('/create', 'BlogController@create')->middleware('auth:admin', 'permission:Blogs add')->name('admin.blog.create');
            Route::get('/delete/{id}', 'BlogController@delete')->middleware('auth:admin', 'permission:Blogs delete');
            Route::get('/edit/{id}', 'BlogController@edit')->middleware('auth:admin', 'permission:Blogs edit');
            Route::post('/update', 'BlogController@update_blog')->middleware('auth:admin', 'permission:Blogs edit')->name('admin.blog.update');

            //Add Blog FAQs Permission if Needed //
            Route::get('/{id}', 'BlogController@FAQ')->name('admin.blog.faq');
            Route::post('/createFAQ', 'BlogController@createFAQ')->name('admin.blog.faq.create');
            Route::get('/loadFAQ/{id}', 'BlogController@loadFAQ')->name('admin.blog.faq.load');
            Route::get('/faq/edit/{id}', 'BlogController@editFAQ');
            Route::post('/faq/update', 'BlogController@updateFAQ')->name('admin.blog.faq.update');
            Route::get('/faq/delete/{id}', 'BlogController@deleteFAQ');
        });

        Route::prefix('author')->middleware('auth:admin', 'permission:Blogs view')->group(function () {

            Route::get('/', 'AuthorController@index')->name('admin.author');
            Route::post('/create', 'AuthorController@create')->name('admin.author.create');
            Route::get('/load', 'AuthorController@load')->name('admin.author.load');
            Route::get('/edit/{id}', 'AuthorController@edit');
            Route::get('/delete/{id}', 'AuthorController@delete');
        });

        //Careers
        Route::prefix('careers')->middleware('auth:admin', 'permission:Career modify')->group(function () {

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
            Route::prefix('meta')->middleware('auth:admin', 'permission:SEO metatags')->group(function () {
                Route::get('/', 'SeoController@meta')->name('admin.seo.meta');
                Route::post('/check', 'SeoController@meta_check')->name('admin.seo.meta.check');
                Route::post('/update', 'SeoController@meta_update')->name('admin.seo.meta.update');
            });
            Route::prefix('snippet')->middleware('auth:admin', 'permission:SEO snippetcode')->group(function () {
                Route::get('/', 'SeoController@snippet')->name('admin.seo.snippet');
                Route::get('/load', 'SeoController@snippet_load')->name('admin.seo.snippet.load');
                Route::post('/create', 'SeoController@snippet_create')->name('admin.seo.snippet.create');
                Route::get('/delete/{id}', 'SeoController@snippet_delete');
                Route::get('/edit/{id}', 'SeoController@snippet_edit');
                Route::post('/update', 'SeoController@snippet_update')->name('admin.seo.snippet.update');
            });
        });


        //Website Users
        Route::prefix('web/users')->middleware('auth:admin', 'permission:Webuser view')->group(function () {
            Route::get('/', 'WebUserController@index')->name('admin.webUsers');
            Route::get('/load', 'WebUserController@load')->name('admin.webUsers.load');
            Route::post('/filter', 'WebUserController@user_filter')->name('admin.webUsers.filter');
            Route::post('/export', 'WebUserController@user_export')->name('admin.webUsers.export');

            //Invoice Requests
            Route::prefix('invoices')->group(function () {
                Route::get('/', 'UserInvoiceController@index')->name('admin.users.invoices');
                Route::get('/approve/{id}', 'UserInvoiceController@approve');
                Route::get('/reject/{id}', 'UserInvoiceController@reject');
            });

            //Withdraw Requests
            Route::prefix('withdraw')->group(function () {
                Route::get('/', 'WithdrawController@index')->name('admin.users.withdraw');
                Route::get('/approve/{id}', 'WithdrawController@approve');
                Route::get('/transfer/{id}', 'WithdrawController@transfer');
                Route::get('/reject/{id}', 'WithdrawController@reject');
                Route::post('/reject', 'WithdrawController@rejectSubmit')->name('admin.users.withdraw.reject');
            });

            //Genie Wish Requests
            Route::prefix('genie-wish')->group(function () {
                Route::get('/', 'GenieWishController@index')->name('admin.users.geniewish');
                Route::get('/view/{id}', 'GenieWishController@view');
                Route::get('/approve/{id}', 'GenieWishController@approve');
                Route::get('/close/{id}', 'GenieWishController@close');
                Route::get('/reject/{id}', 'GenieWishController@reject');
                Route::post('/reject', 'GenieWishController@rejectSubmit')->name('admin.users.geniewish.reject');
            });
        });

        //DCM Contest
        Route::prefix('invoices')->middleware('auth:admin', 'permission:Contest modify')->group(function () {

            Route::get('/', 'InvoiceController@index')->name('admin.invoices');
            Route::get('/load', 'InvoiceController@load')->name('admin.invoices.load');
            Route::get('/details/{id}', 'InvoiceController@details')->name('admin.invoices.details');
            Route::get('/update/{id}/{status}', 'InvoiceController@UpdateStatus');
            Route::get('/view/{id}', 'InvoiceController@viewInvoices');
            Route::post('/filter', 'InvoiceController@filter')->name('admin.invoices.filter');

            Route::get('/delete/{id}', 'InvoiceController@delAllInvoice');
            Route::get('/deleteSingle/{id}', 'InvoiceController@delSingleInvoice');

            //QR 
            Route::get('/scanned_qr', 'InvoiceController@scanned_qr')->name('admin.invoices.scanned_qr');
            Route::get('/load_qr', 'InvoiceController@load_qr')->name('admin.invoices.load_qr');
            Route::post('/qr_filter', 'InvoiceController@qr_filter')->name('admin.invoices.qr_filter');
            Route::get('/delete_qr/{id}', 'InvoiceController@delete_qr');

            //Toss
            Route::post('/toss', 'InvoiceController@toss')->name('admin.invoices.toss');
        });

        //Categories
        Route::prefix('categories')->middleware('auth:admin', 'permission:Admin categories')->group(function () {
            Route::get('/', 'CategoryController@index')->name('admin.categories');
            Route::get('/load', 'CategoryController@load')->name('admin.categories.load');
            Route::post('/create', 'CategoryController@create')->name('admin.categories.create');
            Route::get('/edit/{id}', 'CategoryController@edit');
            Route::get('/delete/{id}', 'CategoryController@delete');
        });

        //Countries
        Route::prefix('countries')->middleware('auth:admin', 'permission:Admin countries')->group(function () {
            Route::get('/', 'CountryController@index')->name('admin.countries');
            Route::get('/load', 'CountryController@load')->name('admin.countries.load');
            Route::post('/create', 'CountryController@create')->name('admin.countries.create');
            Route::get('/edit/{id}', 'CountryController@edit');
            Route::get('/delete/{id}', 'CountryController@delete');
        });

        //States
        Route::prefix('states')->middleware('auth:admin', 'permission:Admin countries')->group(function () {
            Route::get('/load', 'StateController@load')->name('admin.states.load');
            Route::post('/create', 'StateController@create')->name('admin.states.create');
            Route::get('/edit/{id}', 'StateController@edit');
            Route::get('/delete/{id}', 'StateController@delete');
        });

        //users
        Route::prefix('users')->middleware('auth:admin', 'permission:Admin users')->group(function () {
            Route::get('/', 'UserController@index')->name('admin.users');
            Route::get('/load', 'UserController@load')->name('admin.users.load');
            Route::post('/create', 'UserController@create')->name('admin.users.create');
            Route::get('/edit/{id}', 'UserController@edit');
            Route::post('/update', 'UserController@update_user')->name('admin.users.update');
            Route::get('/delete/{id}', 'UserController@delete');
            Route::get('/changeStatus/{id}/{status}', 'UserController@changeStatus');
        });

        //Newsletter
        Route::prefix('newsletter')->middleware('auth:admin', 'permission:Newsletter')->group(function () {
            Route::get('/', 'NewsletterController@index')->name('admin.newsletter');
            Route::get('/load', 'NewsletterController@load')->name('admin.newsletter.load');
            Route::post('/filter', 'NewsletterController@user_filter')->name('admin.newsletter.filter');
            Route::post('/export', 'NewsletterController@user_export')->name('admin.newsletter.export');
        });


        //Loyalty Program
        Route::prefix('loyalty')->middleware('auth:admin', 'permission:Admin loyalty')->group(function () {

            //Settings
            Route::prefix('settings')->group(function () {

                Route::get('/', 'LoyaltyController@settings')->name('admin.loyalty.settings');
                Route::prefix('conversionRate')->group(function () {
                    Route::post('/add', 'LoyaltyController@addConverstionRate')->name('admin.loyalty.settings.conversionRate.add');
                    Route::get('/delete/{id}', 'LoyaltyController@deleteConverstionRate');
                    Route::get('/edit/{id}', 'LoyaltyController@editConverstionRate');
                    Route::post('/update', 'LoyaltyController@updateConverstionRate')->name('admin.loyalty.settings.conversionRate.update');
                });

                Route::prefix('eligibility')->group(function () {
                    Route::get('/edit/{id}', 'LoyaltyController@editEligibility');
                    Route::post('/update', 'LoyaltyController@updateEligibility')->name('admin.loyalty.settings.eligibility.update');
                });

                Route::prefix('reward')->group(function () {
                    Route::get('/edit/{id}', 'LoyaltyController@editReward');
                    Route::post('/update', 'LoyaltyController@updateReward')->name('admin.loyalty.settings.reward.update');
                });

                Route::prefix('categories')->group(function () {
                    Route::post('/add', 'LoyaltyController@addCategories')->name('admin.loyalty.settings.categories.add');
                    Route::get('/delete/{id}', 'LoyaltyController@deleteCategories');
                    Route::get('/edit/{id}', 'LoyaltyController@editCategories');
                    Route::post('/update', 'LoyaltyController@updateCategories')->name('admin.loyalty.settings.categories.update');
                });
            });
        });


        //Home :: Slider Section
        Route::prefix('home')->middleware('auth:admin', 'permission:CMS modify')->group(function () {

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
        Route::prefix('about')->middleware('auth:admin', 'permission:CMS modify')->group(function () {
            Route::get('/', 'CmsController@about')->name('admin.about');
            Route::get('/load', 'CmsController@load_about')->name('admin.about.load');
            Route::post('/create', 'CmsController@create_about')->name('admin.about.create');
            Route::get('/edit/{id}', 'CmsController@edit_about');
            Route::get('/delete/{id}', 'CmsController@delete_about');
        });

        //Contact-Us
        Route::prefix('contact')->middleware('auth:admin', 'permission:CMS modify')->group(function () {
            Route::get('/', 'CmsController@contact')->name('admin.contact');
            Route::get('/load', 'CmsController@load_contact')->name('admin.contact.load');
            Route::post('/create', 'CmsController@create_contact')->name('admin.contact.create');
            Route::get('/edit/{id}', 'CmsController@edit_contact');
            Route::get('/delete/{id}', 'CmsController@delete_contact');
        });

        //Footer Content
        Route::prefix('footer')->middleware('auth:admin', 'permission:CMS modify')->group(function () {
            Route::get('/', 'CmsController@footer')->name('admin.footer');
            Route::get('/load', 'CmsController@load_footer')->name('admin.footer.load');
            Route::post('/create', 'CmsController@create_footer')->name('admin.footer.create');
            Route::get('/edit/{id}', 'CmsController@edit_footer');
            Route::get('/delete/{id}', 'CmsController@delete_footer');
            Route::post('/copyright/save', 'CmsController@footer_copyright_save')->name('admin.footer.copyright.save');
        });

        //FAQ Content
        Route::prefix('faq')->middleware('auth:admin', 'permission:SEO FAQ modify')->group(function () {
            Route::get('/', 'FaqController@index')->name('admin.faq');
            Route::post('/create', 'FaqController@create')->name('admin.faq.create');
            Route::get('/load', 'FaqController@load')->name('admin.faq.load');
            Route::get('/edit/{id}', 'FaqController@edit');
            Route::post('/update', 'FaqController@update')->name('admin.faq.update');
            Route::get('/delete/{id}', 'FaqController@delete');
        });
    });
});
