<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Coupon;

class ListingController extends Controller
{
    public function index($type){
        $data['type'] = $type;
        $type = ($type == 'online' ? '1' : '2');

        $data['retailers'] = Retailers::where('type', $type)->get();

        return view('web.listing.index')->with($data);
    }

    public function brand($brand_slug){
        $data['retailer'] = Retailers::where('slug', $brand_slug)->first();
        $data['coupons'] = Coupon::where('retailer_id', $data['retailer']->id)->where('status', '1')->get();
        
        return view('web.listing.brand')->with($data);
    }
}
