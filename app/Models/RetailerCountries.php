<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;

class RetailerCountries extends Model
{
    use HasFactory;

    protected $table = 'retailer_countries';

    public $timestamps = false;

    public function country(){
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }

}
