<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Retailers;
use URL;

class HomeController extends Controller
{
    public function index()
    {   
        $data['categories'] = Categories::where('parent_id', 0)->get();
        $data['allstores'] = Retailers::inRandomOrder()->where('status', '1')->limit(6)->get();
        $data['retailstores'] = Retailers::inRandomOrder()->where('type', '2')->where('status', '1')->limit(5)->get();

        return view('web.index')->with($data);
    }

    public function search($value){
        $re = Retailers::where('name', 'like', '%'.$value.'%')->limit(6)->get();
        $html = '';
        foreach ($re as $key => $val) {
            $html .= '<a href="'.route('brand', $val->slug).'" class="main-search-result-item">
                              <img src="'.URL::to('public/storage/retailers/'.$val->logo).'" height="40px">
                              | '.$val->name.'
                           </a>';
        }

        echo $html;

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
