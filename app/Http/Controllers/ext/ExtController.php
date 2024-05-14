<?php

namespace App\Http\Controllers\ext;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtController extends Controller
{
    public function index($url)
    {
        

        return view('web.ext.index');
    }
}
