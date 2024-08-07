<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faq';

    public static function create(array $data){
        $f = new Faq;
        $retailer_id = 0 ;
        $blog_id = 0 ;

        if (in_array($data['retailer_id'], $data)) {
           $retailer_id = $data['retailer_id'];
        }
        if (in_array($data['blog_id'], $data)) {
            $blog_id = $data['blog_id'];
         }

        $f->heading = $data['heading'];
        $f->content = $data['content'];
        $f->blog_id = $blog_id;
        $f->country_id = $data['country_id'];
        $f->retailer_id = $retailer_id;
        
        $f->added_by = Auth::guard('admin')->id();

        $f->save();

        return $f->id;
    }

    public static function updateFAQ($id, array $data){

        $f = Faq::find($id);
        
        $f->heading = $data['heading'];
        $f->content = $data['content'];
        $f->country_id = $data['country_id'];
        $f->save();

        return $f->id;

    }

    public function country(){
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }
}
