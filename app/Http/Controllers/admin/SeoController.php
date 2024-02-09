<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MetaTags;
use Auth;

class SeoController extends Controller
{
    //Meta Tags
    public function meta(){
        $data['menu'] = 'seo.meta';

        return view('admin.seo.meta.index')->with($data);
    }
    public function meta_check(Request $request){
        $data['menu'] = 'seo.meta';
        $url = $request->get('url');
        $data['meta'] = MetaTags::where('url', $url)->first();

        return view('admin.seo.meta.check')->with($data);
    }


    public function meta_update(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['meta_title']) || empty($data['meta_keywords']) || empty($data['meta_description'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{

            $meta = MetaTags::where('url', $data['url'])->first();
            if(empty($meta->id)){
                $meta = new MetaTags;
            }

            $meta->url = $data['url'];
            $meta->title = $data['meta_title'];
            $meta->keywords = $data['meta_keywords'];
            $meta->description = $data['meta_description'];
            $meta->created_by = Auth::guard('admin')->id();
            $meta->save();

            $response['success'] = 'success';
            $response['message'] = 'Success! Meta Tags Successfully Updated.';

            echo json_encode($response);
        }
    }




    //Snippet Code
    public function snippet(){
        $data['menu'] = 'seo.snippet';

        return view('admin.seo.snippet.index')->with($data);
    }
}
