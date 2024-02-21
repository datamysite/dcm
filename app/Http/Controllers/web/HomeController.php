<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class HomeController extends Controller
{
    public function index()
    {   
        $data['categories'] = Categories::where('parent_id', 0)->get();

        return view('web.index')->with($data);
    }

    //About Us Controller
    public function About_Us()
    {

        return view('web.content.about-us');
    }

    //Sell With DCM Controller
    public function Sell_With_DCM()
    {

        return view('web.content.sell-with-dcm');
    }

    //Store Products Controller
    public function Store_Products()
    {

        return view('web.listing.store-products');
    }

    //Store Single Product Controller
    public function Store_Single_Product()
    {

        return view('web.listing.store-single-product');
    }

    //Blogs Controller
    public function Blogs()
    {

        return view('web.blogs.blogs');
    }

    //Single Blog Controller
    public function Single_Blog()
    {

        return view('web.blogs.single-blog');
    }

    //User Profile Controller
    


    //User Settings Controller
    public function Categoires()
    {

        return view('web.listing.categories');
    }
}
