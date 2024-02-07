<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use URL;

class CouponController extends Controller
{
    public function index($id){
        $data['menu'] = 'retailers';
        $data['retailer'] = Retailers::find(base64_decode($id));

        return view('admin.retailers.coupons.index')->with($data);
    }

    public function search_retailer($val){
        $html = '';

        $data = Retailers::where('name', 'like', '%'.$val.'%')->limit(7)->get();
        foreach ($data as $key => $value) {
            $html .= '<a href="'.route('admin.retailer.coupon', base64_encode($value->id)).'">
                          <p>
                            <img src="'.URL::to("/public/storage/retailers/".$value->logo).'">&nbsp;&nbsp;&nbsp;&nbsp;|
                            &nbsp;&nbsp;&nbsp;&nbsp;<span>'.$value->name.'</span>
                          </p>
                        </a>';
        }

        echo $html;               
    }
}
