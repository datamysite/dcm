<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\States;
use Auth;

class StateController extends Controller
{

    public function load(){
        $response = [];
        $data = States::all();
        
        return view('admin.countries.state_load', ['data' => $data]);
    }

    public function create(Request $request){
        $data = $request->all();
        //dd($data);
        $response = [];

        if (empty($data['name']) || empty($data['shortname'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $cat = States::where('name', $data['name'])->where('country_id', $data['country_id'])->get();
            if(count($cat) == 0 && empty($data['state_id'])){
                $id = States::create($data);

                if ($request->hasFile('category_image')) {
                    $file = $request->file('category_image');
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . date('dmyhis') . '.' . $ext;

                    $file->move(public_path() . '/storage/states', $newname);

                    $c = States::find($id);
                    $c->image = $newname;
                    $c->save();
                }

                $response['success'] = 'success';
                $response['message'] = 'Success! New State Added.';
            }else{
                if(!empty($data['state_id'])){
                    $cat = States::where('name', $data['name'])->where('id', '!=', base64_decode($data['state_id']))->get();
                    if(count($cat) == 0){
                        $ca = States::find(base64_decode($data['state_id']));
                        $ca->name = $data['name'];
                        $ca->shortname = $data['shortname'];
                        $ca->save();


                        if ($request->hasFile('edit_category_image')) {
                            $file = $request->file('edit_category_image');
                            $ext = $file->getClientOriginalExtension();
                            $newname = $ca->id . date('dmyhis') . '.' . $ext;

                            $file->move(public_path() . '/storage/states', $newname);

                            $ca->image = $newname;
                            $ca->save();
                        }

                        $response['success'] = 'success';
                        $response['message'] = 'Success! State Updated.';
                    }else{ 
                        $response['success'] = false;
                        $response['errors'] = 'Alert! This State ('.$data["name"].') is already availble.';
                    }
                }else{
                    $response['success'] = false;
                    $response['errors'] = 'Alert! This State ('.$data["name"].') is already availble.';
                }
            }
        }

        echo json_encode($response);
    }

    public function edit($id){
        $id = base64_decode($id);
        $data['countries'] = Countries::all();
        $data['data'] = States::find($id);

        return view('admin.countries.edit_state')->with($data);
    }



    public function delete($id){
        $id = base64_decode($id);

        States::destroy($id);

        $response = 'success';

        return $response;
    }
}
