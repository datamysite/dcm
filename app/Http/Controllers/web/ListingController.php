<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;

class ListingController extends Controller
{
    public function index($type){
        $data['type'] = $type;
        $data['retailers'] = Retailers::all();
        
        return view('web.listing.index')->with($data);
    }
}
