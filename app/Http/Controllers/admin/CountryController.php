<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use Auth;

class CountryController extends Controller
{
    public function index(){
        $data['menu'] = 'countries';
        $data['data'] = Countries::all();

        return view('admin.countries.index')->with($data);
    }

    public function load(){
        $response = [];
        $data = Countries::all();
        
        return view('admin.countries.load', ['data' => $data]);
    }

    public function create(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['name']) || empty($data['shortname'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $cat = Countries::where('name', $data['name'])->get();
            if(count($cat) == 0 && empty($data['country_id'])){
                $id = Countries::create($data);

                $response['success'] = 'success';
                $response['message'] = 'Success! New Country Added.';
            }else{
                if(!empty($data['country_id'])){
                    $cat = Countries::where('name', $data['name'])->where('id', '!=', base64_decode($data['country_id']))->get();
                    if(count($cat) == 0){
                        $ca = Countries::find(base64_decode($data['country_id']));
                        $ca->name = $data['name'];
                        $ca->shortname = $data['shortname'];
                        $ca->save();

                        $response['success'] = 'success';
                        $response['message'] = 'Success! Country Updated.';
                    }else{ 
                        $response['success'] = false;
                        $response['errors'] = 'Alert! This Country ('.$data["name"].') is already availble.';
                    }
                }else{
                    $response['success'] = false;
                    $response['errors'] = 'Alert! This Country ('.$data["name"].') is already availble.';
                }
            }
        }

        echo json_encode($response);
    }

    public function edit($id){
        $id = base64_decode($id);

        $data = Countries::find($id);

        return view('admin.countries.edit', ['data' => $data]);
    }



    public function delete($id){
        $id = base64_decode($id);

        Countries::destroy($id);

        $response = 'success';

        return $response;
    }
}
