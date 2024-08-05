<?php

namespace App\Http\Controllers\web;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Coupon;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\ClicksCounter;
use App\Models\Testimonials;
use App\Models\States;
use App\Models\Offers;
use App\Models\OfferQrCode;
use App\Models\Seller;
use App\Models\StoreVisits;
use App\Models\Faq;
use App\Models\RetailerBlogs;
use PDF;
use Hash;
use Auth;

class ListingController extends Controller
{
    public function index($lang, $type, Request $request, $region = 'dubai')
    {
        $req = $request->all();
        $data['type'] = $type;
        $type = ($type == 'online' ? '1' : '2');
        //dd($region);
        //Filters -- start
        $data['categories_f'] = Categories::select('id', 'name', 'name_ar', 'type')
            ->where('parent_id', 0)
            ->where('status', '1')
            ->when($type == '1', function ($q) {
                return $q->where('type', 3);
            })
            ->get();
        $data['countries_f'] = Countries::select('id', 'name')->get();
        $data['states_f'] = States::select('id', 'name')->where('country_id', config('app.country'))->get();
        //Filter -- end

        $data['retailers'] = Retailers::where('type', $type)
            ->where('status', '1')
            ->when($type != '1', function ($q) use ($region) {
                return $q->whereHas('states', function ($qq) use ($region) {
                    return $qq->whereHas('state', function ($qqq) use ($region) {
                        return $qqq->where('slug', $region);
                    });
                });
            })
            ->when(!empty($req['country']), function ($q) use ($req) {
                return $q->whereHas('countries', function ($qq) use ($req) {
                    return $qq->where('country_id', $req['country']);
                });
            })
            ->when(empty($req['country']), function ($q) use ($req) {
                return $q->whereHas('countries', function ($qq) use ($req) {
                    return $qq->where('country_id', config('app.country'));
                });
            })
            ->when(!empty($req['discount']), function ($q) use ($req) {
                return $q->where('discount_upto', '<=', $req['discount']);
            })
            ->paginate(12);

        return view($this->getView('web.listing.store_type'))->with($data);
    }

    public function all_stores($lang, Request $request, $region = 'dubai'){
        $req = $request->all();
        //dd($region);
        //Filters -- start
        $data['categories_f'] = Categories::select('id', 'name', 'name_ar', 'type')
                                                ->where('parent_id', 0)
                                                ->where('status', '1')
                                                ->when(config('app.retail') == false, function($q){
                                                    return $q->limit(6);
                                                })
                                                ->get();
        $data['countries_f'] = Countries::select('id', 'name')->get();
        $data['states_f'] = States::select('id', 'name')->where('country_id', config('app.country'))->get();
        //Filter -- end

        $data['retailers'] = Retailers::where('status', '1')
                                        ->when(!empty($req['country']), function($q) use ($req){
                                            return $q->whereHas('countries', function($qq) use ($req){
                                                return $qq->where('country_id', $req['country']);
                                            });
                                        })
                                        ->when(empty($req['country']), function($q) use ($req){
                                            return $q->whereHas('countries', function($qq) use ($req){
                                                return $qq->where('country_id', config('app.country'));
                                            });
                                        })
                                        ->when(!empty($req['discount']), function($q) use ($req){
                                                return $q->where('discount_upto', '<=', $req['discount']);
                                        })
                                        ->paginate(12);

        return view($this->getView('web.listing.index'))->with($data);
    }

    public function brand($brand_slug)
    {

        $data['retailer'] = Retailers::where('slug', $brand_slug)->first();
        $data['coupons'] = Coupon::where('retailer_id', $data['retailer']->id)->where('status', '1')->get();
        $data['offers'] = Offers::where('retailer_id', $data['retailer']->id)->get();
        $data['testimonials'] = Testimonials::where('status', '1')->orderBy('created_at', 'desc')->limit(10)->get();

        //Get retailer FAqs
        $data['faqs'] = Faq::where('retailer_id', $data['retailer']->id)->get();
        $data['retailor_blog_header'] = RetailerBlogs::where('retailer_id', $data['retailer']->id)->where('section_id', 1)->get();
        $data['retailor_blog_footer'] = RetailerBlogs::where('retailer_id', $data['retailer']->id)->where('section_id', 2)->get();

        $data['suggested'] = Retailers::where('slug', '!=', $brand_slug)->limit(16)->where('status', '1')->inRandomOrder()->get();

        $data['top_stores'] = Retailers::where('status', 1)->get()->shuffle()->take(6);

        $data['isMobile'] = Agent::isMobile();
        //dd($data['isMobile']);
        ClicksCounter::hitCount('1', $data['retailer']->id);

        if (Auth::check()) {
            $sv = StoreVisits::where('user_id', Auth::id())->where('retailer_id', $data['retailer']->id)->first();
            if (empty($sv->id)) {
                $s = new StoreVisits;
                $s->user_id = Auth::id();
                $s->retailer_id = $data['retailer']->id;
                $s->save();
            }
        }

        return view($this->getView('web.listing.brand'))->with($data);
    }


    public function category_brand($cat_slug, $brand_slug, $region = 'dubai')
    {

        $data['category_slug'] = $cat_slug;
        $data['category'] = Categories::where('name', ListingController::sanitizeStringForUrl($cat_slug))->first();
        $data['retailer'] = Retailers::where('slug', $brand_slug)->first();
        $data['coupons'] = Coupon::where('retailer_id', $data['retailer']->id)
            ->whereHas('categories', function ($q) use ($data) {
                return $q->where('category_id', $data['category']->id);
            })
            ->where('status', '1')->get();
        $data['testimonials'] = Testimonials::where('status', '1')->orderBy('created_at', 'desc')->limit(10)->get();
        $data['offers'] = Offers::where('retailer_id', $data['retailer']->id)->get();

        //Get retailer FAqs
        $data['faqs'] = Faq::where('retailer_id', $data['retailer']->id)->get();
        $data['retailor_blog_header'] = RetailerBlogs::where('retailer_id', $data['retailer']->id)->where('section_id', 1)->get();
        $data['retailor_blog_footer'] = RetailerBlogs::where('retailer_id', $data['retailer']->id)->where('section_id', 2)->get();


        $data['suggested'] = Retailers::where('slug', '!=', $brand_slug)->limit(16)->where('status', '1')->inRandomOrder()->get();

        $data['top_stores'] = Retailers::where('status', 1)->get()->shuffle()->take(6);
        
        $data['isMobile'] = Agent::isMobile();

        ClicksCounter::hitCount('1', $data['retailer']->id);

        return view($this->getView('web.listing.brand'))->with($data);
    }


    public function category_sub($cat_slug, $type, $request, $region = 'dubai')
    {
        $data['category_slug'] = $cat_slug;
        $req = $request;
        $data['type'] = $type;
        $type = ($type == 'online' ? '1' : '2');
        $data['category'] = Categories::where('name', ListingController::sanitizeStringForUrl($cat_slug))->first();
        //dd(ListingController::sanitizeStringForUrl($cat_slug));
        //Filters -- start
        $data['categories_f'] = Categories::select('id', 'name', 'name_ar', 'type')
            ->where('parent_id', 0)
            ->where('status', '1')
            ->when($type == '1', function ($q) {
                return $q->where('type', 3);
            })
            ->get();
        $data['subcategories_f'] = Categories::select('id', 'name', 'name_ar', 'type')->where('parent_id', $data['category']->id)->where('status', '1')->get();
        $data['countries_f'] = Countries::select('id', 'name')->get();
        $data['states_f'] = States::select('id', 'name')->where('country_id', config('app.country'))->get();
        //Filter -- end

        if ($type == '1') {
            $data['categories'] = Categories::where('parent_id', 0)->where('type', 3)->where('status', '1')->get();
            //dd($data);
        } else {
            $data['categories'] = Categories::where('parent_id', $data['category']->id)->where('status', '1')->get();
            //dd($type);
        }
        $data['retailers'] = Retailers::where('type', $type)
            ->when($type != '1', function ($q) use ($region) {
                return $q->whereHas('states', function ($qq) use ($region) {
                    return $qq->whereHas('state', function ($qqq) use ($region) {
                        return $qqq->where('slug', $region);
                    });
                });
            })
            ->whereHas('categories', function ($q) use ($data) {
                return $q->where('category_id', $data['category']->id);
            })
            ->when(!empty($req['country']), function ($q) use ($req) {
                return $q->whereHas('countries', function ($qq) use ($req) {
                    return $qq->where('country_id', $req['country']);
                });
            })
            ->when(empty($req['country']), function ($q) use ($req) {
                return $q->whereHas('countries', function ($qq) use ($req) {
                    return $qq->where('country_id', config('app.country'));
                });
            })
            ->when(!empty($req['discount']), function ($q) use ($req) {
                return $q->where('discount_upto', '<=', $req['discount']);
            })
            ->where('status', '1')
            ->paginate(12);

        return view($this->getView('web.listing.categories_with_type'))->with($data);
    }

    public function category($cat_slug, $request)
    {
        $data['category_slug'] = $cat_slug;
        $req = $request;
        $region = 'dubai';
        $data['category'] = Categories::where('name', ListingController::sanitizeStringForUrl($cat_slug))->first();


        //Filters -- start
        $data['categories_f'] = Categories::select('id', 'name', 'name_ar', 'type')
            ->where('parent_id', 0)
            ->where('status', '1')
            ->get();
        $data['subcategories_f'] = Categories::select('id', 'name', 'name_ar', 'type')->where('parent_id', $data['category']->id)->where('status', '1')->get();
        $data['countries_f'] = Countries::select('id', 'name')->get();
        $data['states_f'] = States::select('id', 'name')->where('country_id', config('app.country'))->get();
        //Filter -- end

        if (!empty($req['type']) && $req['type'] == '1') {
            $data['categories'] = Categories::where('parent_id', 0)->where('type', 3)->where('status', '1')->get();
            //dd($data);
        } else {
            $data['categories'] = Categories::where('parent_id', $data['category']->id)->where('status', '1')->get();
            //dd($type);
        }
        $data['retailers'] = Retailers::whereHas('categories', function ($q) use ($data) {
            return $q->where('category_id', $data['category']->id);
        })
            ->where('status', '1')
            ->when(!empty($req['country']), function ($q) use ($req) {
                return $q->whereHas('countries', function ($qq) use ($req) {
                    return $qq->where('country_id', $req['country']);
                });
            })
            ->when(empty($req['country']), function ($q) use ($req) {
                return $q->whereHas('countries', function ($qq) use ($req) {
                    return $qq->where('country_id', config('app.country'));
                });
            })
            ->when(!empty($req['discount']), function ($q) use ($req) {
                return $q->where('discount_upto', '<=', $req['discount']);
            })
            ->when(!empty($req['type']), function ($q) use ($req, $region) {
                return $q->when($req['type'] != '1', function ($rq) use ($region) {
                    return $rq->whereHas('states', function ($rqq) use ($region) {
                        return $rqq->whereHas('state', function ($rqqq) use ($region) {
                            return $rqqq->where('slug', $region);
                        });
                    });
                })->where('type', $req['type'])->orWhere('type', '3');
            })
            ->paginate(12);
        //dd($data);
        return view($this->getView('web.listing.categories'))->with($data);
    }

    public function all_categories($request, $region = 'dubai'){
        $req = $request;
        $data['categories_f'] = Categories::select('id', 'name', 'name_ar', 'type', 'image')
                                                ->where('parent_id', 0)
                                                ->where('status', '1')
                                                ->when(config('app.retail') == false, function($q){
                                                    return $q->limit(6);
                                                })
                                                ->get();
        $data['states_f'] = States::select('id', 'name')->where('country_id', config('app.country'))->get();
        
        $data['retailers'] = Retailers::when(!empty($req['country']), function($q) use ($req){
                                            return $q->whereHas('countries', function($qq) use ($req){
                                                return $qq->where('country_id', $req['country']);
                                            });
                                        })
                                        ->when(empty($req['country']), function($q) use ($req){
                                            return $q->whereHas('countries', function($qq) use ($req){
                                                return $qq->where('country_id', config('app.country'));
                                            });
                                        })
                                        ->when(!empty($req['discount']), function($q) use ($req){
                                                return $q->where('discount_upto', '<=', $req['discount']);
                                        })
                                        ->where('status', '1')
                                        ->paginate(12);

        return view($this->getView('web.listing.all_categories'))->with($data);
    }


    public function show_coupon($lang, $id){
        $id = base64_decode($id);
        $data['coupon'] = Coupon::find($id);

        ClicksCounter::hitCount('2', $data['coupon']->retailer_id, $data['coupon']->id, '1');

        return view($this->getView('web.listing.modal.coupon'))->with($data);
    }


    public function coupon_grab_deal($lang, $id, Request $request)
    {
        $req = $request->all();
        $data['coupon'] = Coupon::find($id);
        ClicksCounter::hitCount('4', $data['coupon']->retailer_id, $data['coupon']->id, '1');
        //dd($data);

        if (!empty($req['m'])) {
            return redirect()->away($req['h']);
        } else {

            return 'success';
        }
    }


    public function show_offer($lang, $id)
    {
        $id = base64_decode($id);
        $data['offer'] = Offers::find($id);

        $qr = new OfferQrCode;
        $qr->offer_id = $data['offer']->id;
        $qr->save();

        $data['qrid'] = $qr->id;

        ClicksCounter::hitCount('3', $data['offer']->retailer_id, $data['offer']->id, '2');

        return view($this->getView('web.listing.modal.offer'))->with($data);
    }


    public function redirect_whatsapp($lang, $id, Request $request)
    {
        $req = $request->all();

        $data['offer'] = Offers::find($id);
        ClicksCounter::hitCount('5', $data['offer']->retailer_id, $data['offer']->id, '2');

        if (!empty($req['m'])) {
            return redirect()->away($req['h']);
        } else {

            return 'success';
        }
    }



    public function redeem_pdf($lang, $id)
    {

        $data['qrid'] = base64_decode($id);
        $data['qrcode'] = OfferQrCode::find($data['qrid']);
        $data['offer'] = Offers::find($data['qrcode']->offer_id);

        $pdf = PDF::loadView('web.listing.modal.pdf', $data);

        return $pdf->download('DCM-Redeem-Code.pdf');

        //return view('web.listing.modal.pdf')->with($data);
    }


    public function generate_qrcode($lang, $slug, $id)
    {
        $data['retailer'] = Retailers::where('slug', $slug)->first();
        $data['qrcode'] = OfferQrCode::find(base64_decode($id));
        //dd(base64_decode($id));
        return view('web.listing.modal.verify')->with($data);
    }

    public function qrcode_markasused($lang,  Request $request)
    {
        $data = $request->all();
        $qr = OfferQrCode::find(base64_decode($data['id']));
        if (!empty($qr->offer->retailer_id)) {
            $s = Seller::where('retailer_id', $qr->offer->retailer_id)->first();
            if (!empty($s->id)) {

                if (Hash::check($data['fieldValue'], $s->password)) {

                    $qr->status = '1';
                    $qr->save();

                    return 'success';
                } else {
                    return 'incorrect';
                }
            } else {
                return 'error';
            }
        } else {
            return 'error';
        }
    }


    function sanitizeStringForUrl($string)
    {
        $string = str_replace('-', ' ', $string);
        $string = str_replace('and', '&', $string);
        $string = ucwords($string);
        return $string;
    }
}
