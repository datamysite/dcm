<?php

namespace App\Http\Controllers\web;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Coupon;
use App\Models\Categories;
use App\Models\ClicksCounter;

class ListingController extends Controller
{
    public function index($type){
        $data['type'] = $type;
        $type = ($type == 'online' ? '1' : '2');

        $data['retailers'] = Retailers::where('type', $type)->paginate(12);

        return view('web.listing.index')->with($data);
    }

    public function brand($brand_slug){
        $data['retailer'] = Retailers::where('slug', $brand_slug)->first();
        $data['coupons'] = Coupon::where('retailer_id', $data['retailer']->id)->where('status', '1')->get();
        
        return view('web.listing.brand')->with($data);
    }


    public function category_sub($cat_slug, $type){
        $data['type'] = $type;
        $type = ($type == 'online' ? '1' : '2');
        $data['category'] = Categories::where('name', ListingController::sanitizeStringForUrl($cat_slug))->first();
        if($type == '1'){
            $data['categories'] = Categories::where('parent_id', 0)->where('type', 3)->get();
                                    //dd($data);
        }else{
            $data['categories'] = Categories::where('parent_id', $data['category']->id)->get();
            //dd($type);
        }
        $data['retailers'] = Retailers::where('type', $type)
                                        ->whereHas('categories', function($q) use ($data){
                                            return $q->where('category_id',$data['category']->id);
                                        })
                                        ->paginate(12);

        return view('web.listing.categories_with_type')->with($data);
    }

    public function category($cat_slug){
        $data['category'] = Categories::where('name', ListingController::sanitizeStringForUrl($cat_slug))->first();
        $data['categories'] = Categories::where('parent_id', $data['category']->id)->get();
        $data['retailers'] = Retailers::whereHas('categories', function($q) use ($data){
                                            return $q->where('category_id', $data['category']->id);
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
