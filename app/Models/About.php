<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class About extends Model
{
    use HasFactory;

    protected $table = "about_us";

    public static function create(array $data){

        $a = new About;

        $a->section_number = $data['about_section'];
        $a->title = $data['about_title'];
        $a->desc = $data['about_description'];
        $a->created_by = Auth::guard('admin')->id();
        $a->save();

        return $a->id;
    }

  

}
