<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCategories extends Model
{
    use HasFactory;

    protected $table = 'coupon_categories';

    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
