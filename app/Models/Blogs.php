<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Blogs extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    public static function create(array $data){
        $b = new Blogs;
        $b->heading = $data['heading'];
        $b->slug = $data['slug'];
        $b->description = $data['description'];
        $b->status = '1';
        $b->created_by = Auth::guard('admin')->id();
        $b->save();

        return $b->id;
    }
}
