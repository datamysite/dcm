<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\Retailers;
use App\Models\RetailerCountries;
use Auth;

class RetailerController extends Controller
{
    public function index(){
        $data['menu'] = 'retailers';
        $data['countries'] = Countries::all();

        return view('admin.retailers.index')->with($data);
    }

    public function load(){
        $response = [];
        $data = Retailers::all();
        
        return view('admin.retailers.load', ['data' => $data]);
    }

    public function retailers_filter(Request $request){
        $req = $request->all();
        $data = Retailers::when(!empty($req['name']), function ($q) use ($req) {
                    return $q->where('name', 'LIKE', $req['name']."%");
                })->when(!empty($req['discount_upto']), function ($q) use ($req) {
                    return $q->where('discount_upto', $req['discount_upto']);
                })->when(!empty($req['country']), function ($q) use ($req) {
                    return $q->whereHas('countries',function($qq) use ($req){
                        return $qq->where('country_id', $req['country']);
                    });
                })->get();

        return view('admin.retailers.load', ['data' => $data]);
    }

    public function create(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['name']) || empty($data['slug']) || empty($data['discount_upto']) || empty($data['discount_tags'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $id = Retailers::create($data);

            if($request->hasFile('retailer_image')){
                $file = $request->file('retailer_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id.date('dmyhis').'.'.$ext;

                $file->move(public_path().'/storage/retailers',$newname);

                $c = Retailers::find($id);
                $c->logo = $newname;
                $c->save();

            }

            $response['success'] = 'success';
            $response['message'] = 'Success! New Retailer Added.';

        echo json_encode($response);
        }
    }

    public function edit($id){
        $id = base64_decode($id);

        $data['countries'] = Countries::all();
        $data['data'] = Retailers::find($id);

        return view('admin.retailers.edit')->with($data);
    }


    public function update_retailer(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['name']) || empty($data['slug']) || empty($data['discount_upto']) || empty($data['discount_tags'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $id = Retailers::update_retailer(base64_decode($data['retailer_id']), $data);

            if($request->hasFile('edit_retailer_image')){
                $file = $request->file('edit_retailer_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id.date('dmyhis').'.'.$ext;

                $file->move(public_path().'/storage/retailers',$newname);

                $c = Retailers::find($id);
                $c->logo = $newname;
                $c->save();

            }

            $response['success'] = 'success';
            $response['message'] = 'Success! New Retailer Added.';

        echo json_encode($response);
        }
    }



    public function delete($id){
        $id = base64_decode($id);

        Retailers::destroy($id);

        $response = 'success';

        return $response;
    }
}
