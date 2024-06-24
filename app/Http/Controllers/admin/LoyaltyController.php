<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoyaltyController extends Controller
{
    //Settings
    public function settings(){

        $data['menu'] = 'admin.footer';


        return view('admin.loyalty.settings.index')->with($data);
    }
}
