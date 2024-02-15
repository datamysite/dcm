<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\RetailerCategories;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\Offers;
use URL;

class OfferController extends Controller
{
    public function index($id){
        $data['menu'] = 'retailers';
        $data['retailer'] = Retailers::find(base64_decode($id));
        $data['categories'] = RetailerCategories::where('retailer_id', base64_decode($id))->get();
        $data['country'] = Countries::all();
        //dd($data['categories']);
        return view('admin.retailers.offers.index')->with($data);
    }

    public function load($id){
        $response = [];
        $data = Offers::where('retailer_id', base64_decode($id))->get();
        
        return view('admin.retailers.offers.load', ['data' => $data]);
    }

    public function search_retailer($val){
        $html = '';

        $data = Retailers::where('name', 'like', '%'.$val.'%')->limit(7)->get();
        foreach ($data as $key => $value) {
            $html .= '<a href="'.route('admin.retailer.offer', base64_encode($value->id)).'">
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

        if (empty($data['title']) || empty($data['discount']) || empty($data['country'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $id = Offers::create($data);

            if($request->hasFile('coupon_image')){
                $file = $request->file('coupon_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id.date('dmyhis').'.'.$ext;

                $file->move(public_path().'/storage/retailers/offers',$newname);

                $c = Offers::find($id);
                $c->banner = $newname;
                $c->save();

            }

            $response['success'] = 'success';
            $response['message'] = 'Success! New Offer Added.';

            echo json_encode($response);
        }
    }


    public function update_coupon(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['title']) || empty($data['discount']) || empty($data['country'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $id = Offers::update_coupon(base64_decode($data['offer_id']), $data);

            if($request->hasFile('coupon_image')){
                $file = $request->file('coupon_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id.date('dmyhis').'.'.$ext;

                $file->move(public_path().'/storage/retailers/offers',$newname);

                $c = Offers::find($id);
                $c->banner = $newname;
                $c->save();

            }

            $response['success'] = 'success';
            $response['message'] = 'Success! Offer Succcessfully Updated.';

            echo json_encode($response);
        }
    }

    public function edit($id){
        $id = base64_decode($id);

        $data['data'] = Offers::find($id);
        $data['categories'] = RetailerCategories::where('retailer_id', $data['data']->retailer_id)->get();
        $data['country'] = Countries::all();

        return view('admin.retailers.offers.edit')->with($data);
    }

    public function delete($id){
        $id = base64_decode($id);

        Offers::destroy($id);

        $response = 'success';

        return $response;
    }
}
