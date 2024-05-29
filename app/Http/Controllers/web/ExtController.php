<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtController extends Controller
{
    public function index($lang, $url)
    {
        $data['url'] = $url;

        return view('web.extension.index')->with($data);
    }
}
