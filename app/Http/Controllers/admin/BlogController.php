<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use Auth;

class BlogController extends Controller
{
    public function index(){
        $data['menu'] = 'blogs';

        return view('admin.blogs.index')->with($data);
    }

    public function load(){
        $response = [];
        $data = Blogs::all();
        
        return view('admin.blogs.load', ['data' => $data]);
    }

    public function search($val){
        $response = [];
        $data = Blogs::when($val !== '--empty--', function($q) use ($val){
            return $q->where('heading', 'like', '%'.$val.'%');
        })->get();
        
        return view('admin.blogs.load', ['data' => $data]);
    }

    public function create(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['slug']) || empty($data['description']) || empty($data['short_description'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{

            $id = Blogs::create($data);

            if($request->hasFile('coupon_image')){
                $file = $request->file('coupon_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id.date('dmyhis').'.'.$ext;

                $file->move(public_path().'/storage/blogs',$newname);

                $b = Blogs::find($id);
                $b->banner = $newname;
                $b->save();
            }

            $response['success'] = 'success';
            $response['message'] = 'Success! New Blog Added.';
        }

        echo json_encode($response);
    }

    public function update_blog(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['slug']) || empty($data['description']) || empty($data['short_description'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{

            $id = Blogs::blog_update(base64_decode($data['blog_id']), $data);

            if($request->hasFile('edit_mblog_image')){
                $file = $request->file('edit_mblog_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id.date('dmyhis').'.'.$ext;

                $file->move(public_path().'/storage/blogs',$newname);

                $b = Blogs::find($id);
                $b->banner = $newname;
                $b->save();
            }

            $response['success'] = 'success';
            $response['message'] = 'Success! Blog Successfully Updated.';
        }

        echo json_encode($response);
    }

    public function edit($id){
        $id = base64_decode($id);

        $data = Blogs::find($id);

        return view('admin.blogs.edit', ['data' => $data]);
    }



    public function delete($id){
        $id = base64_decode($id);

        Blogs::destroy($id);

        $response = 'success';

        return $response;
    }
}
