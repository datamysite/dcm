<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestScan extends Model
{
    use HasFactory;

    protected $table = 'contest_scan';


    public static function hitScan($name){
        $s = new ContestScan;
        $s->name = $name;
        $s->save();
    }
}
