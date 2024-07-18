<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class Blogs extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    public static function create(array $data){
        $b = new Blogs;
        $b->heading = $data['heading'];
        $b->banner_alt = $data['banner_alt'];
        $b->slug = $data['slug'];
        $b->description = $data['description'];
        $b->short_description = $data['short_description'];
        $b->category_id = $data['category_id'];
        $b->author_id = $data['author_id'];
        $b->status = '1';
        $b->created_by = Auth::guard('admin')->id();
        $b->save();

        return $b->id;
    }


    public static function blog_update($id, array $data){
        $b = Blogs::find($id);
        $b->heading = $data['heading'];
        $b->banner_alt = $data['banner_alt'];
        $b->slug = $data['slug'];
        $b->description = $data['description'];
        $b->short_description = $data['short_description'];
        $b->category_id = $data['category_id'];
        $b->author_id = $data['author_id'];
        $b->save();

        return $b->id;
    }

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function author(){
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
