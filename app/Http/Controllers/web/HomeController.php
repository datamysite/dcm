<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Retailers;

class HomeController extends Controller
{
    public function index()
    {   
        $data['categories'] = Categories::where('parent_id', 0)->get();
        $data['allstores'] = Retailers::inRandomOrder()->where('status', '1')->limit(6)->get();

        return view('web.index')->with($data);
    }

    //About Us Controller
    public function About_Us()
    {

        return view('web.content.about-us_n');
    }

    //Sell With DCM Controller
    public function Sell_With_DCM()
    {

        return view('web.content.sell-with-dcm_n');
    }

    //FAQS
    public function FAQS()
    {
        return view('web.content.faqs');
    }

    //Terms
    public function Terms()
    {
        return view('web.content.terms-conditions');
    }

    //Privacy_Policy
    public function Privacy_Policy()
    {
        return view('web.content.privacy-policy');
    }

    //Anti_Spam
    public function Anti_Spam()
    {
        return view('web.content.anti-spam-policy');
    }
}
