<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\RetailerCategories;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\Coupon;
use App\Models\CouponCategories;
use URL;

class CouponController extends Controller
{
    public function index($id){
        $data['menu'] = 'retailers';
        $data['retailer'] = Retailers::find(base64_decode($id));
        $data['categories'] = RetailerCategories::where('retailer_id', base64_decode($id))->get();
        $data['country'] = Countries::all();
        //dd($data['countries']);
        return view('admin.retailers.coupons.index')->with($data);
    }

    public function load($id){
        $response = [];
        $data = Coupon::where('retailer_id', base64_decode($id))->get();
        
        return view('admin.retailers.coupons.load', ['data' => $data]);
    }

    public function search_retailer($val){
        $html = '';

        $data = Retailers::where('name', 'like', '%'.$val.'%')->limit(7)->get();
        foreach ($data as $key => $value) {
            $html .= '<a href="'.route('admin.retailer.coupon', base64_encode($value->id)).'">
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

        if (empty($data['code']) || empty($data['heading']) || empty($data['discount']) || empty($data['country']) || empty($data['people_used'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $id = Coupon::create($data);

            if($request->hasFile('coupon_image')){
                $file = $request->file('coupon_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id.date('dmyhis').'.'.$ext;

                $file->move(public_path().'/storage/retailers/coupons',$newname);

                $c = Coupon::find($id);
                $c->banner = $newname;
                $c->save();

            }

            $response['success'] = 'success';
            $response['message'] = 'Success! New Coupon Added.';

            echo json_encode($response);
        }
    }


    public function update_coupon(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['code']) || empty($data['heading']) || empty($data['discount']) || empty($data['country']) || empty($data['people_used'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $id = Coupon::update_coupon(base64_decode($data['coupon_id']), $data);

            if($request->hasFile('edit_coupon_image')){
                $file = $request->file('edit_coupon_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id.date('dmyhis').'.'.$ext;

                $file->move(public_path().'/storage/retailers/coupons',$newname);

                $c = Coupon::find($id);
                $c->banner = $newname;
                $c->save();

            }

            $response['success'] = 'success';
            $response['message'] = 'Success! Coupon Succcessfully Updated.';

            echo json_encode($response);
        }
    }

    public function edit($id){
        $id = base64_decode($id);

        $data['country'] = Countries::all();
        $data['data'] = Coupon::find($id);
        $data['categories'] = RetailerCategories::where('retailer_id', $data['data']->retailer_id)->get();

        return view('admin.retailers.coupons.edit')->with($data);
    }

    public function delete($id){
        $id = base64_decode($id);

        Coupon::destroy($id);

        $response = 'success';

        return $response;
    }
}
