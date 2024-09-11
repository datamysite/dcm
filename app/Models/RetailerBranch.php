<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin;

class RetailerBranch extends Model
{
    use HasFactory;

    protected $table = 'retailer_branch';



    public function admin(){
        return $this->belongsTo(admin::class, 'created_by', 'id');
    }
}
