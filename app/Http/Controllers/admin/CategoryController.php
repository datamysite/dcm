<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Auth;

class CategoryController extends Controller
{
    public function index(){
        $data['menu'] = 'categories';

        return view('admin.categories.index')->with($data);
    }

    public function load(){
        $response = [];
        $data = Categories::all();
        
        return view('admin.categories.load', ['data' => $data]);
    }

    public function create(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['name']) || empty($data['max_discount'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $cat = Categories::where('name', $data['name'])->get();
            if(count($cat) == 0 && empty($data['cat_id'])){
                $id = Categories::create($data);

                if($request->hasFile('category_image')){
                    $file = $request->file('category_image');
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id.date('dmyhis').'.'.$ext;

                    $file->move(public_path().'/storage/categories',$newname);

                    $c = Categories::find($id);
                    $c->image = $newname;
                    $c->save();

                }

                $response['success'] = 'success';
                $response['message'] = 'Success! New Category Created.';
            }else{
                if(!empty($data['cat_id'])){
                    $cat = Categories::where('name', $data['name'])->where('id', '!=', base64_decode($data['cat_id']))->get();
                    if(count($cat) == 0){
                        $ca = Categories::find(base64_decode($data['cat_id']));
                        $ca->name = $data['name'];
                        $ca->max_discount = $data['max_discount'];

                        if($request->hasFile('edit_category_image')){
                            $file = $request->file('edit_category_image');
                            $ext = $file->getClientOriginalExtension();
                            $newname = $ca->id.date('dmyhis').'.'.$ext;
                            $file->move(public_path().'/storage/categories',$newname);
                            $ca->image = $newname;
                        }
                        $ca->save();

                        $response['success'] = 'success';
                        $response['message'] = 'Success! Category Updated.';
                    }else{ 
                        $response['success'] = false;
                        $response['errors'] = 'Alert! This category ('.$data["name"].') is already availble.';
                    }
                }else{
                    $response['success'] = false;
                    $response['errors'] = 'Alert! This category ('.$data["name"].') is already availble.';
                }
            }
        }

        echo json_encode($response);
    }

    public function edit($id){
        $id = base64_decode($id);

        $data = Categories::find($id);

        return view('admin.categories.edit', ['data' => $data]);
    }



    public function delete($id){
        $id = base64_decode($id);

        Categories::destroy($id);

        $response = 'success';

        return $response;
    }
}
