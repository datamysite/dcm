<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\RetailerBranch;

class RetailerBranchController extends Controller
{
    
    public function index($id)
    {
        $data['menu'] = 'retailers';
        $data['retailer'] = Retailers::find(base64_decode($id));

        return view('admin.retailers.branch.index')->with($data);
    }

    public function load($id)
    {
        $response = [];
        $data = RetailerBranch::where('retailer_id', base64_decode($id))->get();

        return view('admin.retailers.branch.load', ['data' => $data]);
    }
}
