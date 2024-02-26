<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $data['menu'] = 'dashboard';

        return view('seller.dashboard')->with($data);
    }
}
