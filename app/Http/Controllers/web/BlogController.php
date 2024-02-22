<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogController extends Controller
{
    
    public function index()
    {
        $data['featured'] = Blogs::select('id', 'banner', 'heading', 'slug', 'short_description')->where('id', '5')->first();
        $data['blogs'] = Blogs::select('id', 'banner', 'heading', 'slug', 'short_description')->where('id', '!=', '5')->get();

        return view('web.blogs.blogs')->with($data);
    }

    public function detail($slug)
    {
        $data['blog'] = Blogs::where('slug', $slug)->first();

        return view('web.blogs.single-blog')->with($data);
    }
}
