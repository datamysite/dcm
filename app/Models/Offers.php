<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;
use App\Models\Categories;
use App\Models\OfferCategories;
use App\Models\Admin;
use Auth;

class Offers extends Model
{
    use HasFactory;

    protected $table = 'offers';
    

    public static function create(array $data){
        $r = new Offers;
        $r->retailer_id = base64_decode($data['retailer_id']);
        $r->title = $data['title'];
        $r->discount = $data['discount'];
        $r->country_id = $data['country'];
        $r->description = empty($data['description']) ? '' : $data['description'];
        $r->created_by = Auth::guard('admin')->id();
        $r->save();


        foreach ($data['categories'] as $key => $val) {
            $rc = new OfferCategories;
            $rc->offer_id = $r->id;
            $rc->category_id = $val;
            $rc->save();
        }

        return $r->id;

    }


    public static function update_coupon($id, array $data){
        $r = Offers::find($id);
        $r->title = $data['title'];
        $r->discount = $data['discount'];
        $r->country_id = $data['country'];
        $r->description = empty($data['description']) ? '' : $data['description'];
        $r->save();


        OfferCategories::where('offer_id', $id)->delete();
        foreach ($data['categories'] as $key => $val) {
            $rc = new OfferCategories;
            $rc->offer_id = $r->id;
            $rc->category_id = $val;
            $rc->save();
        }

        return $r->id;

    }

    public function user(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function country(){
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }

    public function categories(){
        return $this->hasMany(OfferCategories::class, 'offer_id', 'id');
    }
}
