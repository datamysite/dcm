<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetailerBlogController extends Controller
{
    public function index(){
        $data['menu'] = 'retailers';

        return view('admin.retailers.blogs.index')->with($data);
    }
}
