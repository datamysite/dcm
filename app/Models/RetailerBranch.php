<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin;
use App\Models\Retailers;
use Auth;

class RetailerBranch extends Model
{
    use HasFactory;

    protected $table = 'retailer_branch';

    public static function create($data){
        $rb = new RetailerBranch;
        $rb->retailer_id = base64_decode($data['retailer_id']);
        $rb->name = $data['name'];
        $rb->created_by = Auth::guard('admin')->user()->id;
        $rb->save();
    }


    public function retailer(){
        return $this->belongsTo(Retailers::class, 'retailer_id', 'id');
    }

    public function admin(){
        return $this->belongsTo(admin::class, 'created_by', 'id');
    }
}
