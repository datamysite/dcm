<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Retailers;

class CashbackRequests extends Model
{
    use HasFactory;

    protected $table = 'cashback_requests';

    public function userDetails()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function retailerName()
    {
        return $this->belongsTo(Retailers::class, 'retailer_id' , 'id');
    }

}
