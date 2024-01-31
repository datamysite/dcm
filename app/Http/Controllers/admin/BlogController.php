<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $data['menu'] = 'blogs';

        return view('admin.blogs.index')->with($data);
    }
}
