<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;
use App\Models\Admin;
use Auth;

class RetailerBlogs extends Model
{
    use HasFactory;

    protected $table = 'retailer_blogs';
    

    public static function create(array $data){
        $r = new RetailerBlogs;
        $r->retailer_id = base64_decode($data['retailer_id']);
        if(!empty($data['branch_id'])){
            $r->branch_id = base64_decode($data['branch_id']);
        }
        $r->heading = $data['heading'];
        $r->country_id = $data['country'];
        $r->description = empty($data['description']) ? '' : $data['description'];
        $r->status = '1';
        $r->section_id =  $data['section_id'];
        $r->created_by = Auth::guard('admin')->id();
        $r->save();

        return $r->id;

    }

    public static function update_blog($id, array $data){
        $r = RetailerBlogs::find($id);
        $r->heading = $data['heading'];
        $r->country_id = $data['country'];
        $r->description = empty($data['description']) ? '' : $data['description'];
        $r->section_id =  $data['section_id'];
        $r->save();

        return $r->id;

    }

    public function country(){
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }

    public function user(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
