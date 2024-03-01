<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;

class States extends Model
{
    use HasFactory;

    protected $table = 'states';

    public $timestamps = false;


    public static function create(array $data){
        $c = new States;
        $c->country_id = $data['country_id'];
        $c->name = $data['name'];
        $c->shortname = $data['shortname'];
        $c->save();

        return $c->id;
    }

    public function country(){
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }
}
