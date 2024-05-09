<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Coupon;


class ExtController extends Controller
{
    public function getRetailers($limit){
        $data = Retailers::select('id', 'name', 'logo', 'slug', 'store_link', 'discount_upto')->where(['status' => '1', 'type' => '1'])->limit($limit)->get();

        return response()->json($data);
    }

    public function getOffers(Request $request){
        $data = $request->all();
        $res = 0;


        return response()->json($res);
    }

    public function findRetailer($val){

        $data = Retailers::select('id', 'name', 'logo', 'slug', 'store_link', 'discount_upto')
                            ->where('name', 'LIKE', '%'.$val.'%')
                            ->where(['status' => '1', 'type' => '1'])
                            ->limit(9)->get();

        return response()->json($data);
    }
}
