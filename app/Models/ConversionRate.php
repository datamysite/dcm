<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;

class ConversionRate extends Model
{
    use HasFactory;

    protected $table = 'conversion_rate';



    public function country(){
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }
}
