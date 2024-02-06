<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Countries extends Model
{
    use HasFactory;

    protected $table = "countries";

    public static function create(array $data){
        $c = new Countries;
        $c->name = $data['name'];
        $c->shortname = $data['shortname'];
        $c->save();

        return $c->id;
    }
}
