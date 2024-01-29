<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $data['menu'] = 'dashboard';

        return view('admin.dashboard')->with($data);
    }
}
