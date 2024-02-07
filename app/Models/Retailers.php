<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RetailerCountries;
use Auth;

class Retailers extends Model
{
    use HasFactory;

    protected $table = 'retailers';
    

    public static function create(array $data){
        $r = new Retailers;
        $r->name = $data['name'];
        $r->slug = $data['slug'];
        $r->store_link = empty($data['store_link']) ? '' : $data['store_link'];
        $r->discount_upto = $data['discount_upto'];
        $r->discount_tags = $data['discount_tags'];
        $r->status = '1';
        $r->created_by = Auth::guard('admin')->id();
        $r->save();


        foreach ($data['country'] as $key => $val) {
            $rc = new RetailerCountries;
            $rc->retailer_id = $r->id;
            $rc->country_id = $val;
            $rc->save();
        }

        return $r->id;

    }

    public static function update_retailer($id, array $data){
        $r = Retailers::find($id);
        $r->name = $data['name'];
        $r->slug = $data['slug'];
        $r->store_link = empty($data['store_link']) ? '' : $data['store_link'];
        $r->discount_upto = $data['discount_upto'];
        $r->discount_tags = $data['discount_tags'];
        $r->save();

        RetailerCountries::where('retailer_id', $id)->delete();
        foreach ($data['country'] as $key => $val) {
            $rc = new RetailerCountries;
            $rc->retailer_id = $id;
            $rc->country_id = $val;
            $rc->save();
        }

        return $id;

    }

    public function countries(){
        return $this->hasMany(RetailerCountries::class, 'retailer_id', 'id');
    }
}
