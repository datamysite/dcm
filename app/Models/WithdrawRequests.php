<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class WithdrawRequests extends Model
{
    use HasFactory;

    protected $table = 'withdraw_requests';


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
