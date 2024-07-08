<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = "banks";

    public static function create(array $data){
        
        $c = new Bank;
        $c->bank_name = $data['eng_value'];
        $c->bank_name_ar = $data['arabic_value'];

        $c->save();

        return $c->id;
    }

}
