<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function meta(){
        $data['menu'] = 'seo.meta';

        return view('admin.seo.meta')->with($data);
    }

    public function snippet(){
        $data['menu'] = 'seo.snippet';

        return view('admin.seo.snippet')->with($data);
    }
}
