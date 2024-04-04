<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Retailers;
use App\Models\States;
use App\Models\HomeStores;
use App\Models\About;
use App\Models\Footer;
use URL;
use App\Helpers\Mailer;
use Jenssegers\Agent\Facades\Agent;

class HomeController extends Controller
{
    public function index($lang, $region)
    {   
        $isMobile = Agent::isMobile();
        $data['allstates'] = States::where('country_id', '1')->orderBy('name', 'asc')->get();
        $data['categories'] = Categories::where('parent_id', 0)
                                ->when(config('app.amp') == true && $isMobile, function($q){
                                    return $q->limit(6);
                                })->get();
        $data['onlinestores'] = HomeStores::where('retailer_type', '1')
                                ->when(config('app.amp') == true && $isMobile, function($q){
                                    return $q->limit(4);
                                })->orderBy('id', 'desc')->get();
      
        return view($this->getView('web.index'))->with($data);
    }

    //Includes Lazy Load

        public function get_footer($lang, $region){   
            $data['footCat'] = Footer::where('section_id', '3')->get();
            $data['footBrand'] = Footer::where('section_id', '2')->get();
            $data['footAbout'] = Footer::where('section_id', '1')->orderBy('order_number')->get();

            $data['copyright'] = Footer::where('section_id', '4')->first();

            return view($this->getView('web.content.lazyload.includes.getFooter'))->with($data);
        } 


    // Home lazy load

        public function get_states($lang, $region, $type){   
            $data['type'] = $type;
            $data['allstates'] = States::where('country_id', '1')->orderBy('name', 'asc')->get();

            return view($this->getView('web.content.lazyload.home.getStates'))->with($data);
        } 

        public function get_categories($lang, $region){   
            $data['categories'] = Categories::where('parent_id', 0)->get();

            return view($this->getView('web.content.lazyload.home.getCategories'))->with($data);
        } 


        public function get_online_store($lang, $region){   
            $data['onlinestores'] = HomeStores::where('retailer_type', '1')->limit(10)->orderBy('id', 'desc')->get();

            return view($this->getView('web.content.lazyload.home.getOnlineStores'))->with($data);
        } 

        public function get_retail_store($lang, $region){   
            $isMobile = Agent::isMobile();
            $data['retailstores'] = HomeStores::where('retailer_type', '2')
                                            ->whereHas('retailer', function($q) use ($region){
                                                return $q->whereHas('states', function($qq) use ($region){
                                                    return $qq->whereHas('state', function($qqq) use ($region){
                                                        return $qqq->where('slug', $region);
                                                    });
                                                });
                                            })->when(config('app.amp') == true && $isMobile, function($q){
                                                return $q->limit(4);
                                            })->orderBy('id', 'desc')->get();

            return view($this->getView('web.content.lazyload.home.getRetailStores'))->with($data);
        } 

        public function get_all_store($lang, $region){   
            $data['allstores'] = HomeStores::where('retailer_type', '3')->limit(3)->orderBy('id', 'desc')->get();

            return view($this->getView('web.content.lazyload.home.getAllStores'))->with($data);
        } 





    // Home lazy load

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
        $data['section1'] = About::where('section_number', '1')->orderBy('id', 'desc')->first();
        $data['section2'] = About::where('section_number', '2')->orderBy('id', 'desc')->first();

        return view('web.content.about-us_n')->with($data);
    }

    //About Us Controller
    public function Contact_Us()
    {

        return view('web.content.contact-us');
    }


    public function Contact_Us_submit($region, Request $request){
        $data = $request->all();
        $response = [];

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:13|max:13',
            'subject' => 'required',
            'messages' => 'required',
        ]);

        $mail = Mailer::sendMail('New Inquiry Received!', 'admin@dealsandcouponsmena.com', 'DCM', 'web.emailers.insiders.inquiry', $data);

        if($mail){
            $response['success'] = 'success';
            $response['message'] = 'Success! Your inquiry successfully submited.';
        }else{

            $response['success'] = 'error';
            $response['message'] = 'Something went wrong.';
        }



        echo json_encode($response);
    }

    //Sell With DCM Controller
    public function Sell_With_DCM()
    {
        $data['navbarCategories'] = Categories::select('id', 'image', 'name_ar', 'name', 'type', 'parent_id')->where('parent_id', 0)->get();
        return view('web.content.sell-with-dcm_n')->with($data);
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
        $mail = Mailer::sendMail('Inquiry Received!', $data['email'], $data['business_name'], 'web.emailers.lead_welcome_e', $data);
        $mail2 = Mailer::sendMail('New Lead Received!', 'admin@dealsandcouponsmena.com', 'DCM', 'web.emailers.insiders.lead', $data);

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
