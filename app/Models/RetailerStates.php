<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\States;

class RetailerStates extends Model
{
    use HasFactory;

    protected $table = 'retailer_states';

    public $timestamps = false;

    public function state(){
        return $this->belongsTo(States::class, 'state_id', 'id');
    }
}
