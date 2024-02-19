<?php

namespace App\Http\Controllers\web;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Coupon;
use App\Models\Categories;

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
        $userIp = ListingController::getIPAddress();
        //dd($userIp);
        $client = new Client();
         $response = $client->get("https://ipinfo.io/{$userIp}?token=91b28de1f957f7");
        // Parse the JSON response
         $data = json_decode($response->getBody());
         return json_encode($data);
        // Extract user information
         $data_l['location'] = $data->loc;
         $data_l['country'] = $data->country;
         $data_l['currency'] = $data->currency;

        $id = base64_decode($id);
        $data['coupon'] = Coupon::find($id);

        return view('web.listing.modal.coupon')->with($data);
    }



    function sanitizeStringForUrl($string){
        $string = str_replace('-',' ',$string);
        $string = str_replace('and','&',$string);
        $string = ucwords($string);
        return $string;
    }
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
}
