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
use App\Models\Slider;
use App\Models\Faq;
use App\Models\Testimonials;
use URL;
use DB;
use Auth;
use App\Helpers\Mailer;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index($lang = 'en', $region = 'dubai')
    {
        if ((function_exists('session_status')
            && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
            session_start();
        }

        //$region = empty($_SESSION['region']) ? 'dubai' : $_SESSION['region'];

        $isMobile = Agent::isMobile();
        $data['isMobile'] = $isMobile;
        $data['allstates'] = DB::table('states')->where('country_id', config('app.country'))->orderBy('name', 'asc')->get();
        $data['categories'] = DB::table('categories')->select('id', 'name', 'type', 'name_ar', 'image')->where('parent_id', 0)
            ->when(config('app.retail') == true, function ($q) {
                $q->limit(8);
            })
            ->when(config('app.retail') == false, function ($q) {
                $q->limit(6);
            })
            ->get();
        $data['onlinestores'] = DB::table('homestores')->where('retailer_type', '1')
            ->select('retailers.id', 'retailers.name', 'retailers.name_ar', 'retailers.alt_tag', 'retailers.alt_tag_ar', 'retailers.logo', 'retailers.ar_logo', 'retailers.slug', 'retailers.discount_upto')
            ->join('retailers', 'retailers.id', '=', 'homestores.retailer_id')
            ->where('homestores.del', '0')
            ->when(config('app.amp') == true && $isMobile, function ($q) {
                return $q->limit(4);
            })
            ->when($isMobile == false, function ($q) {
                return $q->limit(10);
            })->orderBy('homestores.id', 'desc')->get();

            $retailersArray = [2,27,55,75,54,14,57,56];
            $data['topstores'] = Retailers::where('status', 1)->whereIn('id', $retailersArray)->orderByRaw("FIELD(id, " . implode(",", $retailersArray) . ")")
            ->when(config('app.amp') == true && $isMobile, function ($q) {
                return $q->limit(4);
            })
            ->when($isMobile == false, function ($q) {
                return $q->limit(10);
            })->get();

        $data['retailstores'] = HomeStores::where('retailer_type', '2')
            ->where('del', '0')
            ->whereHas('retailer', function ($q) use ($region) {
                return $q->whereHas('states', function ($qq) use ($region) {
                    return $qq->whereHas('state', function ($qqq) use ($region) {
                        return $qqq->where('slug', $region);
                    });
                });
            })->when(config('app.amp') == true && $isMobile, function ($q) {
                return $q->limit(4);
            })->orderBy('id', 'desc')->get();

        $data['allstores'] = DB::table('homestores')->where('retailer_type', '3')
            ->select('retailers.id', 'retailers.name', 'retailers.name_ar', 'retailers.alt_tag', 'retailers.alt_tag_ar', 'retailers.logo', 'retailers.ar_logo', 'retailers.slug', 'retailers.discount_upto')
            ->join('retailers', 'retailers.id', '=', 'homestores.retailer_id')
            ->where('homestores.del', '0')
            ->when(config('app.amp') == true && $isMobile, function ($q) {
                return $q->limit(3);
            })->when(config('app.amp') == false || $isMobile == false, function ($q) {
                return $q->limit(6);
            })->orderBy('homestores.id', 'desc')->get();
        $data['slider'] = Slider::where('del', '0')->where('lang', app()->getLocale())->where('country_id', config('app.country'))->orderBy('img_order', 'asc')->get();
        //dd($data['slider']);
        $data['region'] = $region;

        if (!empty($_GET['referal_link'])) {

            $_SESSION['referral'] = $_GET['referal_link'];
        }
        return view($this->getView('web.index'))->with($data);
    }

    public function index_old($lang, $region)
    {
        $isMobile = Agent::isMobile();
        $data['allstates'] = States::where('country_id', '1')->orderBy('name', 'asc')->get();
        $data['categories'] = Categories::select('id', 'name', 'name_ar', 'image')->where('parent_id', 0)
            ->when(config('app.amp') == true && $isMobile, function ($q) {
                return $q->limit(8);
            })->get();
        $data['onlinestores'] = HomeStores::where('retailer_type', '1')
            ->when(config('app.amp') == true && $isMobile, function ($q) {
                return $q->limit(4);
            })->orderBy('id', 'desc')->get();

        $data['retailstores'] = HomeStores::where('retailer_type', '2')
            ->whereHas('retailer', function ($q) use ($region) {
                return $q->whereHas('states', function ($qq) use ($region) {
                    return $qq->whereHas('state', function ($qqq) use ($region) {
                        return $qqq->where('slug', $region);
                    });
                });
            })->when(config('app.amp') == true && $isMobile, function ($q) {
                return $q->limit(4);
            })->orderBy('id', 'desc')->get();

        $data['allstores'] = HomeStores::where('retailer_type', '3')->when(config('app.amp') == true && $isMobile, function ($q) {
            return $q->limit(3);
        })->when(config('app.amp') == false || $isMobile == false, function ($q) {
            return $q->limit(6);
        })->orderBy('id', 'desc')->get();

        return view($this->getView('web.index'))->with($data);
    }

    //Includes Lazy Load

    public function get_footer($lang, $region = 'dubai')
    {
        $data['footCat'] = Footer::where('section_id', '3')->get();
        $data['footBrand'] = Footer::where('section_id', '2')->get();
        $data['footAbout'] = Footer::where('section_id', '1')->orderBy('order_number')->get();

        $data['copyright'] = Footer::where('section_id', '4')->first();

        $data['region'] = $region;
        return view($this->getView('web.content.lazyload.includes.getFooter'))->with($data);
    }


    // Home lazy load

    public function get_states($lang, $region = 'dubai', $type)
    {
        $data['type'] = $type;
        $data['allstates'] = States::where('country_id',  config('app.country'))->orderBy('name', 'asc')->get();

        $data['region'] = $region;
        return view($this->getView('web.content.lazyload.home.getStates'))->with($data);
    }

    public function get_categories($lang, $region = 'dubai')
    {
        $data['categories'] = Categories::where('parent_id', 0)->get();

        $data['region'] = $region;
        return view($this->getView('web.content.lazyload.home.getCategories'))->with($data);
    }


    public function get_online_store($lang, $region = 'dubai')
    {
        $data['onlinestores'] = HomeStores::where('retailer_type', '1')->limit(10)->orderBy('id', 'desc')->get();

        $data['region'] = $region;
        return view($this->getView('web.content.lazyload.home.getOnlineStores'))->with($data);
    }

    public function get_retail_store($lang, $region = 'dubai')
    {
        $isMobile = Agent::isMobile();
        $data['retailstores'] = HomeStores::where('retailer_type', '2')
            ->whereHas('retailer', function ($q) use ($region) {
                return $q->whereHas('states', function ($qq) use ($region) {
                    return $qq->whereHas('state', function ($qqq) use ($region) {
                        return $qqq->where('slug', $region);
                    });
                });
            })->when(config('app.amp') == true && $isMobile, function ($q) {
                return $q->limit(4);
            })->orderBy('id', 'desc')->get();
        $data['region'] = $region;

        return view($this->getView('web.content.lazyload.home.getRetailStores'))->with($data);
    }

    public function get_all_store($lang, $region = 'dubai')
    {
        $isMobile = Agent::isMobile();
        $data['allstores'] = HomeStores::where('retailer_type', '3')->when(config('app.amp') == true && $isMobile, function ($q) {
            return $q->limit(6);
        })->when(config('app.amp') == false || $isMobile == false, function ($q) {
            return $q->limit(6);
        })->orderBy('id', 'desc')->get();
        $data['region'] = $region;

        return view($this->getView('web.content.lazyload.home.getAllStores'))->with($data);
    }





    // Home lazy load

    public function search($region, $value, Request $request)
    {
        $req = $request->all();
        $re = Retailers::whereHas('countries', function ($q) {
            $q->where('country_id', config('app.country'));
        })
            ->where('status', '1')
            ->when(app()->getLocale() == 'en', function ($q) use ($value) {
                $q->where('name', 'like', '%' . $value . '%');
            })
            ->when(app()->getLocale() == 'ar', function ($q) use ($value) {
                $q->where('name_ar', 'like', '%' . $value . '%');
            })
            ->limit(6)->get();
        $html = '';
        foreach ($re as $key => $val) {
            $na = app()->getLocale() == 'ar' ? $val->name_ar : $val->name;
            $lo = app()->getLocale() == 'ar' ? $val->ar_logo : $val->logo;
            $html .= '<a href="' . URL::to('/' . app()->getLocale() . '/' . $val->slug) . '" class="main-search-result-item">';
            if (empty($req['m'])) {
                $html .= '<img src="' . config('app.storage') . 'retailers/' . $lo . '" height="40px">';
            } else {
                $html .= '<amp-img src="' . config('app.storage') . 'retailers/' . $lo . '" layout="fixed" width="30px" height="40px"></amp-img>';
            }
            $html .= ' | ' . $na . '
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


    public function Contact_Us_submit($region, Request $request)
    {
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

        if ($mail) {
            $response['success'] = 'success';
            $response['message'] = 'Success! Your inquiry successfully submited.';
        } else {

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


    public function lead_generation($region, Request $request)
    {
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

        if ($mail) {
            $response['success'] = 'success';
            $response['message'] = 'Success! Your inquiry successfully submited.';
        } else {

            $response['success'] = 'error';
            $response['message'] = 'Something went wrong.';
        }



        echo json_encode($response);
    }

    //Write a Review
    public function write_review(Request $request){
        $data = $request->all();
        if(Auth::check()){
            $t = Testimonials::where('created_by', Auth::id())->first();
            if(empty($t->id)){
                $nt = new Testimonials;
                $nt->name = Auth::user()->name;
                $nt->description = $data['description'];
                $nt->rating = $data['rating'];
                $nt->created_by = Auth::id();
                $nt->save();

                return redirect()->back()->with('success', 'Review submited successfully!');
            }else{
                return redirect()->back()->with('error', 'You already submitted a review.!');
            }
        }else{
            return redirect()->back()->with('error', 'Unautherized request.!');
        }

    }

    //FAQS
    public function FAQS()
    {
        $data['faq'] = Faq::where('blog_id', 0)->where('country_id', config('app.country'))->get();
        return view('web.content.' . config('app.country') . '.faqs', ['data' => $data]);
    }

    //Terms
    public function Terms()
    {
        return view('web.content.' . config('app.country') . '.terms-conditions');
    }

    //Privacy_Policy
    public function Privacy_Policy()
    {
        return view('web.content.' . config('app.country') . '.privacy-policy');
    }

    //Anti_Spam
    public function Anti_Spam()
    {
        return view('web.content.' . config('app.country') . '.anti-spam-policy');
    }

    //claim_cashback Landing Page
    public function claim_cashback()
    {
        return view('web.content.' . config('app.country') . '.claim-cashback');
    }

    //Cancel Welcome Message Session
    public function cancelWelcomeMsg($lang)
    {
        $response = [];
        $sessionVariableName = 'welcomeMessageShown';
        $currentSessionValue = session()->get($sessionVariableName);

        if ($currentSessionValue) {
            Session::forget('welcomeMessageShown');
            $response = 200;
        } else {
            $response = 400;
        }
        return json_encode($response);
    }

    //404 Page
    public function not_found()
    {
        $data['categories'] = DB::table('categories')->select('id', 'name', 'type', 'name_ar', 'image')->where('parent_id', 0)
            ->when(config('app.retail') == true, function ($q) {
                $q->limit(8);
            })
            ->when(config('app.retail') == false, function ($q) {
                $q->limit(6);
            })
            ->get();


        return view($this->getView('errors.404'))->with($data);
    }
}
