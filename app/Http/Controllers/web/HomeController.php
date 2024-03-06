<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Retailers;
use URL;
use App\Helpers\Mailer;

class HomeController extends Controller
{
    public function index($region)
    {   
        $data['categories'] = Categories::where('parent_id', 0)->get();
        $data['allstores'] = Retailers::inRandomOrder()->where('status', '1')->limit(6)->get();
        $data['retailstores'] = Retailers::inRandomOrder()->where('type', '2')
                                            ->where('status', '1')
                                            ->whereHas('states', function($qq) use ($region){
                                                return $qq->whereHas('state', function($qqq) use ($region){
                                                    return $qqq->where('slug', $region);
                                                });
                                            })->limit(5)->get();
        $data['onlinestores'] = Retailers::where('type', '1')->limit(10)->get();

        return view('web.index')->with($data);
    }

    public function search($lang,$region, $value){
        $re = Retailers::when(app()->getLocale() == 'en', function($q) use ($value){
                            $q->where('name', 'like', '%'.$value.'%');
                        })
                        ->when(app()->getLocale() == 'ar', function($q) use ($value){
                            $q->where('name_ar', 'like', '%'.$value.'%');
                        })
                        ->limit(6)->get();
        $html = '';
        foreach ($re as $key => $val) {
            $na = app()->getLocale() == 'ar' ? $val->name_ar : $val->name;
            $lo = app()->getLocale() == 'ar' ? $val->ar_logo : $val->logo;
            $html .= '<a href="'.route('brand', [$region, $val->slug]).'" class="main-search-result-item">
                              <img src="'.URL::to('public/storage/retailers/'.$lo).'" height="40px">
                              | '.$na.'
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


    public function lead_generation($region, Request $request){
        $data = $request->all();
        $response = [];

        $validated = $request->validate([
            'business_name' => 'required',
            'business_address' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:13|max:13',
            'category' => 'required',
        ]);

        //dd($data['email']);
        $mail = Mailer::sendMail('Inquiry Received!', $data['email'], $data['business_name'], 'web.emailers.lead_welcome', $data);
        $mail2 = Mailer::sendMail('New Lead Received!', 'contact@dealsandcouponsmena.com', 'DCM', 'web.emailers.insiders.lead', $data);

        if($mail){
            $response['success'] = 'success';
            $response['message'] = 'Success! Your inquiry successfully submited.';
        }else{

            $response['success'] = 'error';
            $response['message'] = 'Something went wrong.';
        }



        echo json_encode($response);
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
