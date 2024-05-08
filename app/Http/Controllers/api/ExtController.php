<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;


class ExtController extends Controller
{
    public function getRetailers($limit){
        $data = Retailers::select('id', 'name', 'logo', 'slug', 'store_link', 'discount_upto')->where(['status' => '1', 'type' => '1'])->limit($limit)->get();

        return response()->json($data);
    }
}
