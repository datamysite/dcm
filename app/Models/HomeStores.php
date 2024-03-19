<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class HomeStores extends Model
{
    use HasFactory;

    protected $table = "homestores";

    public static function create(array $data){

        $hs = new HomeStores;
        $hs->retailer_id = $data['retailer_id'];
        $hs->retailer_type = $data['retailer_type'];
        $hs->retailer_title = $data['retailer_title'];
        $hs->retailer_title_ar = $data['retailer_title_ar'];
        $hs->retailer_desc = $data['retailer_desc'];
        $hs->retailer_desc_ar = $data['retailer_desc_ar'];
        $hs->retailer_order = $data['retailer_order'];
        $hs->url = $data['url'];
        $hs->status = $data['status'];
        $hs->created_by = Auth::guard('admin')->id();
        $hs->save();

        return $hs->id;
    }

    public function retailerName()
    {
        return $this->belongsTo(Retailers::class, 'retailer_id');
    }

}
