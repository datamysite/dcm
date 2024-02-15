<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class HomeController extends Controller
{
    public function index()
    {   
        $data['categories'] = Categories::where('parent_id', 0)->get();

        return view('web.index')->with($data);
    }

    //About Us Controller
    public function About_Us()
    {

        return view('web.about-us');
    }

    //Sell With DCM Controller
    public function Sell_With_DCM()
    {

        return view('web.sell-with-dcm');
    }

    //Store Products Controller
    public function Store_Products()
    {

        return view('web.store-products');
    }

    //Store Single Product Controller
    public function Store_Single_Product()
    {

        return view('web.store-single-product');
    }

    //Blogs Controller
    public function Blogs()
    {

        return view('web.blogs');
    }

    //Single Blog Controller
    public function Single_Blog()
    {

        return view('web.single-blog');
    }

    //User Profile Controller
    public function User_Profile()
    {

        return view('web.user-profile');
    }

    //User Claim Cashback Controller
    public function Claim_Cashback()
    {

        return view('web.user-claim-cashback');
    }

    //User Payment History Controller
    public function Paymeny_History()
    {

        return view('web.user-payment-history');
    }

    //User Referral Earn Controller
    public function Referral_Earn()
    {

        return view('web.user-referral-earn');
    }

    //User Referral Earn Controller
    public function Withdraw_Payment()
    {

        return view('web.user-withdraw-payment');
    }

    //User Settings Controller
    public function User_Settings()
    {

        return view('web.user-settings');
    }

    //User Settings Controller
    public function Categoires()
    {

        return view('web.categories');
    }
}
