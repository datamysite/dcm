<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $data['menu'] = 'retailers';

        return view('admin.retailers.coupons.index')->with($data);
    }
}
