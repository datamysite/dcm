<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Faq;

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
        $id = $data['blog']['id'];
        $data['faq'] = Faq::where('blog_id', $id)->with('country')->get();
        
        return view($this->getView('web.blogs.single-blog'), ['data'=> $data]);
    }
}
