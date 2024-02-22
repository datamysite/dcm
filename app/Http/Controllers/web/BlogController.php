<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogController extends Controller
{
    
    public function index()
    {
        $data['featured'] = Blogs::find('5');
        $data['blogs'] = Blogs::where('id', '!=', '5')->get();

        return view('web.blogs.blogs')->with($data);
    }

    public function Single_Blog()
    {

        return view('web.blogs.single-blog');
    }
}
