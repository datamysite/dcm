<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Categories extends Model
{
    use HasFactory;

    protected $table = "categories";

    public static function create(array $data){
        $c = new Categories;
        $c->name = $data['name'];
        $c->max_discount = $data['max_discount'];
        $c->created_by = Auth::guard('admin')->id();
        $c->save();

        return $c->id;
    }
}
