<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogController extends Controller
{
    
    public function index()
    {
        $data['featured'] = Blogs::select('id', 'banner', 'banner_alt', 'heading', 'slug', 'short_description')->orderBy('id', 'desc')->first();
        $data['blogs'] = Blogs::select('id', 'banner', 'banner_alt', 'heading', 'slug', 'short_description')->where('id', '!=', $data['featured']->id)->orderBy('id', 'desc')->paginate(9);

        return view($this->getView('web.blogs.blogs'))->with($data);
    }

    public function detail($lang, $region, $slug)
    {
        $data['blog'] = Blogs::where('slug', $slug)->first();

        return view($this->getView('web.blogs.single-blog'))->with($data);
    }
}
