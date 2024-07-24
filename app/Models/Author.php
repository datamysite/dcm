<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Author extends Model
{
    use HasFactory;
    protected $table = "authors";

    public static function create(array $data){
        
        $a = new Author;
        $a->name = $data['name'];
        $a->slug = $data['slug'];
        $a->about = $data['about'];
        $a->linkedin_url = $data['linkedin_url'];
        $a->x_url = $data['x_url'];
        $a->facebook_url = $data['facebook_url'];
        $a->created_by = Auth::guard('admin')->id();

        $a->save();

        return $a->id;
    }
}
