<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class OfferCategories extends Model
{
    use HasFactory;

    protected $table = 'offer_categories';

    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
