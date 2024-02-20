<?php

namespace App\Http\Controllers\web;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Coupon;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\ClicksCounter;
use App\Models\Testimonials;
use App\Models\States;

class ListingController extends Controller
{
    public function index($type, Request $request){
        $req = $request->all();
        $data['type'] = $type;
        $type = ($type == 'online' ? '1' : '2');

        //Filters -- start
        $data['categories_f'] = Categories::select('id', 'name', 'type')
                                                ->where('parent_id', 0)
                                                ->where('status', '1')
                                                ->when($type == '1', function($q){
                                                    return $q->where('type', 3);
                                                })
                                                ->get();
        $data['countries_f'] = Countries::select('id', 'name')->get();
        $data['states_f'] = States::select('id', 'name')->get();
        //Filter -- end

        $data['retailers'] = Retailers::where('type', $type)
                                        ->when(!empty($req['country']), function($q) use ($req){
                                            return $q->whereHas('countries', function($qq) use ($req){
                                                return $qq->where('country_id', $req['country']);
                                            });
                                        })
                                        ->when(!empty($req['discount']), function($q) use ($req){
                                                return $q->where('discount_upto', '<=', $req['discount']);
                                        })
                                        ->paginate(12);

        return view('web.listing.index')->with($data);
    }

    public function brand($brand_slug){
        $data['retailer'] = Retailers::where('slug', $brand_slug)->first();
        $data['coupons'] = Coupon::where('retailer_id', $data['retailer']->id)->where('status', '1')->get();
        $data['testimonials'] = Testimonials::where('status', '1')->get();
        
        ClicksCounter::hitCount('1', $data['retailer']->id);

        return view('web.listing.brand')->with($data);
    }


    public function category_sub($cat_slug, $type, Request $request){
        $req = $request->all();
        $data['type'] = $type;
        $type = ($type == 'online' ? '1' : '2');

        $data['category'] = Categories::where('name', ListingController::sanitizeStringForUrl($cat_slug))->first();
        //dd(ListingController::sanitizeStringForUrl($cat_slug));
        //Filters -- start
        $data['categories_f'] = Categories::select('id', 'name', 'type')
                                                ->where('parent_id', 0)
                                                ->where('status', '1')
                                                ->when($type == '1', function($q){
                                                    return $q->where('type', 3);
                                                })
                                                ->get();
        $data['subcategories_f'] = Categories::select('id', 'name', 'type')->where('parent_id', $data['category']->id)->where('status', '1')->get();
        $data['countries_f'] = Countries::select('id', 'name')->get();
        $data['states_f'] = States::select('id', 'name')->get();
        //Filter -- end

        if($type == '1'){
            $data['categories'] = Categories::where('parent_id', 0)->where('type', 3)->where('status', '1')->get();
                                    //dd($data);
        }else{
            $data['categories'] = Categories::where('parent_id', $data['category']->id)->where('status', '1')->get();
            //dd($type);
        }
        $data['retailers'] = Retailers::where('type', $type)
                                        ->whereHas('categories', function($q) use ($data){
                                            return $q->where('category_id',$data['category']->id);
                                        })
                                        ->when(!empty($req['country']), function($q) use ($req){
                                            return $q->whereHas('countries', function($qq) use ($req){
                                                return $qq->where('country_id', $req['country']);
                                            });
                                        })
                                        ->when(!empty($req['discount']), function($q) use ($req){
                                                return $q->where('discount_upto', '<=', $req['discount']);
                                        })
                                        ->paginate(12);

        return view('web.listing.categories_with_type')->with($data);
    }

    public function category($cat_slug, Request $request){
        $req = $request->all();
        $data['category'] = Categories::where('name', ListingController::sanitizeStringForUrl($cat_slug))->first();

        
        //Filters -- start
        $data['categories_f'] = Categories::select('id', 'name', 'type')
                                                ->where('parent_id', 0)
                                                ->where('status', '1')
                                                ->get();
        $data['subcategories_f'] = Categories::select('id', 'name', 'type')->where('parent_id', $data['category']->id)->where('status', '1')->get();
        $data['countries_f'] = Countries::select('id', 'name')->get();
        $data['states_f'] = States::select('id', 'name')->get();
        //Filter -- end

        $data['categories'] = Categories::where('parent_id', $data['category']->id)->get();
        $data['retailers'] = Retailers::whereHas('categories', function($q) use ($data){
                                            return $q->where('category_id', $data['category']->id);
                                        })
                                        ->when(!empty($req['country']), function($q) use ($req){
                                            return $q->whereHas('countries', function($qq) use ($req){
                                                return $qq->where('country_id', $req['country']);
                                            });
                                        })
                                        ->when(!empty($req['discount']), function($q) use ($req){
                                                return $q->where('discount_upto', '<=', $req['discount']);
                                        })
                                        ->paginate(12);

        return view('web.listing.categories')->with($data);
    }

    public function show_coupon($id){
        $id = base64_decode($id);
        $data['coupon'] = Coupon::find($id);

        ClicksCounter::hitCount('2', $data['coupon']->retailer_id, $data['coupon']->id);

        return view('web.listing.modal.coupon')->with($data);
    }



    function sanitizeStringForUrl($string){
        $string = str_replace('-',' ',$string);
        $string = str_replace('and','&',$string);
        $string = ucwords($string);
        return $string;
    } 
}
