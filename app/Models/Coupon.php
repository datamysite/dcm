<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;
use App\Models\Categories;
use App\Models\Admin;
use App\Models\CouponCategories;
use App\Models\Retailers;
use Auth;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';
    

    public static function create(array $data){
        $r = new Coupon;
        $r->retailer_id = base64_decode($data['retailer_id']);
        $r->code = $data['code'];
        $r->heading = $data['heading'];
        $r->link = empty($data['link']) ? '' : $data['link'];
        $r->category_id = '0';
        $r->country_id = $data['country'];
        $r->discount = $data['discount'];
        $r->dcm_cashback = empty($data['dcm_cashback']) ? '' : $data['dcm_cashback'];
        $r->discount_tags = empty($data['discount_tags']) ? '' : $data['discount_tags'];
        $r->total_discount = $data['total_discount'];
        $r->people_used = $data['people_used'];
        $r->description = empty($data['description']) ? '' : $data['description'];
        $r->status = '1';
        $r->created_by = Auth::guard('admin')->id();
        $r->save();



        foreach ($data['categories'] as $key => $val) {
            $rc = new CouponCategories;
            $rc->coupon_id = $r->id;
            $rc->category_id = $val;
            $rc->save();
        }

        return $r->id;

    }


    public static function update_coupon($id, array $data){
        $r = Coupon::find($id);
        $r->code = $data['code'];
        $r->heading = $data['heading'];
        $r->link = empty($data['link']) ? '' : $data['link'];
        $r->category_id = '0';
        $r->country_id = $data['country'];
        $r->discount = $data['discount'];
        $r->dcm_cashback = empty($data['dcm_cashback']) ? '' : $data['dcm_cashback'];
        $r->discount_tags = empty($data['discount_tags']) ? '' : $data['discount_tags'];
        $r->total_discount = $data['total_discount'];
        $r->people_used = $data['people_used'];
        $r->description = empty($data['description']) ? '' : $data['description'];
        $r->save();


        CouponCategories::where('coupon_id', $id)->delete();
        foreach ($data['categories'] as $key => $val) {
            $rc = new CouponCategories;
            $rc->coupon_id = $r->id;
            $rc->category_id = $val;
            $rc->save();
        }

        return $r->id;

    }

    public function retailer(){
        return $this->belongsTo(Retailers::class, 'retailer_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }

    public function categories(){
        return $this->hasMany(CouponCategories::class, 'coupon_id', 'id');
    }

    public function user(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
