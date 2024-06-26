<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Coupon;


class ExtController extends Controller
{
    public function getRetailers($limit){
        $data['brands'] = Retailers::with('coupons:id,heading_ar,heading,code,discount,retailer_id')
                                        ->select('id', 'name', 'logo', 'ar_logo', 'slug', 'store_link', 'discount_upto')
                                        ->where(['status' => '1', 'type' => '1'])
                                        ->limit($limit)->inRandomOrder()->get();

        return response()->json($data);
    }

    public function getRetailerswithurl($limit, $url){
        $data['brands'] = Retailers::with('coupons:id,heading_ar,heading,code,discount,retailer_id')
                                        ->select('id', 'name', 'logo', 'ar_logo', 'slug', 'store_link', 'discount_upto')
                                        ->where('store_link', 'LIKE', '%'.$url.'%')
                                        ->where(['status' => '1', 'type' => '1'])
                                        ->limit($limit)->get();
        if(count($data['brands']) == 0){
            $data['brands'] = Retailers::with('coupons:id,heading_ar,heading,code,discount,retailer_id')
                                        ->select('id', 'name', 'logo', 'ar_logo', 'slug', 'store_link', 'discount_upto')
                                        ->where(['status' => '1', 'type' => '1'])
                                        ->limit($limit)->inRandomOrder()->get();
        }

        return response()->json($data);
    }

    public function getOffers($url){
        $res = 1;

        $Coupon = Coupon::whereHas('retailer', function($q) use ($url){
                                return $q->where('store_link', 'LIKE', '%'.$url.'%');    
                            })->count();

        return response()->json($Coupon);
    }

    public function findRetailer($val){

        $data['brands'] = Retailers::with('coupons:id,heading_ar,heading,code,discount,retailer_id')
                            ->select('id', 'name', 'logo', 'ar_logo', 'slug', 'store_link', 'discount_upto')
                            ->where('name', 'LIKE', '%'.$val.'%')
                            ->where(['status' => '1', 'type' => '1'])
                            ->limit(9)->get();

        return response()->json($data);
    }
}
