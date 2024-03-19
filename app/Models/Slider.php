<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Slider extends Model
{
    use HasFactory;

    protected $table = "slider";

    public static function create(array $data){

        $s = new Slider;

        
        $s->lang = $data['lang_id'];
        $s->img_url = $data['img_url'];
        $s->country_id = $data['country_id'];
        $s->img_order = $data['img_order'];
        $s->created_by = Auth::guard('admin')->id();
        $s->save();

        return $s->id;
    }

    public function counteryName()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

}
