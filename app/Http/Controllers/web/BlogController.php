<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Faq;
use App\Models\Author;
use App\Models\Categories;
use App\Models\Retailers;

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
        $data['blog'] = Blogs::where('slug', $slug)->with('category')->first();

        $id = $data['blog']['id'];
        $category_id = $data['blog']['category_id'];
        $author_id = $data['blog']['author_id'];

        $data['faq'] = Faq::where('blog_id', $id)->with('country')->get();

        $data['author'] = Author::where('id', $author_id)->first();

        //For the Blog Categories and Related Blogs
        $data['category'] = Categories::where('parent_id', 0)->get();
        $data['blogs_category'] = Blogs::where('category_id', $category_id)->with('author')->get()->shuffle()->take(3);

        $data['top_stores'] = Retailers::where('status', 1)->get()->shuffle()->take(10);
        
        return view($this->getView('web.blogs.single-blog'), ['data' => $data]);
    }

    public function author($lang, $slug)
    {

        $data['author'] = Author::where('slug', $slug)->first();
        $data['blog'] = Blogs::where('author_id', $data['author']['id'])->orderBy('id', 'desc')->paginate(9);

        return view($this->getView('web.blogs.author-details'), ['data' => $data]);
    }

    public function categories($lang, $slug)
    {

        $data['category_slug'] = $slug;
        $data['category'] = Categories::where('name', BlogController::sanitizeStringForUrl($slug))->first();

        $data['featured'] = Blogs::select('id', 'banner', 'banner_alt', 'heading', 'slug', 'short_description')->orderBy('id', 'desc')->where('category_id', $data['category']['id'])->first();
        $data['blog'] = Blogs::where('category_id', $data['category']['id'])->orderBy('id', 'desc')->paginate(9);

        return view($this->getView('web.blogs.categories'), ['data' => $data]);
    }

    function sanitizeStringForUrl($string)
    {
        $string = str_replace('-', ' ', $string);
        $string = str_replace('and', '&', $string);
        $string = ucwords($string);
        return $string;
    }
}
