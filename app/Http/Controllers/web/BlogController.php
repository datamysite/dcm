<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Faq;
use App\Models\Author;

class BlogController extends Controller
{
    
    public function index()
    {
        $data['featured'] = Blogs::select('id', 'banner', 'banner_alt', 'heading', 'slug', 'short_description')->orderBy('id', 'desc')->first();
        $data['blogs'] = Blogs::select('id', 'banner', 'banner_alt', 'heading', 'slug', 'short_description')->where('id', '!=', $data['featured']->id)->orderBy('id', 'desc')->paginate(9);

        return view($this->getView('web.blogs.blogs'))->with($data);
    }

    public function detail($lang, $slug)
    {
        $data['blog'] = Blogs::where('slug', $slug)->first();
        $id = $data['blog']['id'];
        $author_id = $data['blog']['author_id'];

        $data['faq'] = Faq::where('blog_id', $id)->with('country')->get();

        $data['author'] = Author::where('id', $author_id)->first();
        
        return view($this->getView('web.blogs.single-blog'), ['data'=> $data]);
    }

    public function author($lang, $id){

        $id = base64_decode($id);
   
        $data['blog'] = Blogs::where('author_id', $id)->orderBy('id', 'desc')->paginate(9);
        $data['author'] = Author::where('id', $id)->first();

        return view($this->getView('web.blogs.author-details') , ['data'=> $data]);
    }
}
