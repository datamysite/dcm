<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Wishcategories;

class GenieWishRequests extends Model
{
    use HasFactory;

    protected $table = 'genie_wish_requests';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Wishcategories::class, 'category_id', 'id');
    }
}
