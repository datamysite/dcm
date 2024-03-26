<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offers;


class OfferQrCode extends Model
{
    use HasFactory;

    protected $table = 'offers_qrcodes';




    public function offer(){
        return $this->belongsTo(Offers::class, 'offer_id', 'id');
    }
}
