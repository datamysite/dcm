<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\RetailerBlogs;
use URL;

class RetailerBlogController extends Controller
{
    public function index($id){
        $data['menu'] = 'retailers';
        $data['retailer'] = Retailers::find(base64_decode($id));
        $data['country'] = Countries::all();

        return view('admin.retailers.blogs.index')->with($data);
    }

    public function load($id){
        $response = [];
        $data = RetailerBlogs::where('retailer_id', base64_decode($id))->get();
        
        return view('admin.retailers.blogs.load', ['data' => $data]);
    }

    public function search_retailer($val){
        $html = '';

        $data = Retailers::where('name', 'like', '%'.$val.'%')->limit(7)->get();
        foreach ($data as $key => $value) {
            $html .= '<a href="'.route('admin.retailer.blog', base64_encode($value->id)).'">
                          <p>
                            <img src="'.URL::to("/public/storage/retailers/".$value->logo).'">&nbsp;&nbsp;&nbsp;&nbsp;|
                            &nbsp;&nbsp;&nbsp;&nbsp;<span>'.$value->name.'</span>
                          </p>
                        </a>';
        }

        echo $html;               
    }


    public function create(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['country']) || empty($data['description']) || empty($data['section_id']) ) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $id = RetailerBlogs::create($data);

            $response['success'] = 'success';
            $response['message'] = 'Success! New blog Added.';

            echo json_encode($response);
        }
    }

    public function edit($id){
        $id = base64_decode($id);

        $data['country'] = Countries::all();
        $data['data'] = RetailerBlogs::find($id);

        return view('admin.retailers.blogs.edit')->with($data);
    }


    public function update_blog(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['country']) || empty($data['description']) || empty($data['section_id']) ) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $id = RetailerBlogs::update_blog(base64_decode($data['blog_id']), $data);

            $response['success'] = 'success';
            $response['message'] = 'Success! Blog Successfully Updated.';

            echo json_encode($response);
        }
    }

    public function delete($id){
        $id = base64_decode($id);

        RetailerBlogs::destroy($id);

        $response = 'success';

        return $response;
    }
}
