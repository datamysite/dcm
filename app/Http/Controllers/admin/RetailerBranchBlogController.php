<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\RetailerBranch;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\RetailerBlogs;
use URL;

class RetailerBranchBlogController extends Controller
{
    public function index($id)
    {
        $data['menu'] = 'retailers';
        $data['branch'] = RetailerBranch::find(base64_decode($id));
        $data['retailer'] = Retailers::find($data['branch']->retailer_id);
        $data['country'] = Countries::all();

        return view('admin.retailers.branch.blogs.index')->with($data);
    }

    public function load($id)
    {
        $response = [];
        $data = RetailerBlogs::where('branch_id', base64_decode($id))->get();

        return view('admin.retailers.branch.blogs.load', ['data' => $data]);
    }


    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['country']) || empty($data['description']) || empty($data['section_id'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $retailer_blog = RetailerBlogs::where('section_id', $data['section_id'])->where('retailer_id', base64_decode($data['retailer_id']))->where('branch_id', base64_decode($data['branch_id']))->get();
            //dd($retailer_blog);
            if (count($retailer_blog) == 0) {

                $id = RetailerBlogs::create($data);

                $response['success'] = 'success';
                $response['message'] = 'Success! New blog Added.';

            } else {
                $response['success'] = false;
                $response['errors'] = 'Error! Section Already Exist !';
            }

            echo json_encode($response);
        }
    }
}
