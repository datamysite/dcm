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
        $branch_id = 0 ;

        if (!empty($data['retailer_id']) && in_array($data['retailer_id'], $data)) {
           $retailer_id = $data['retailer_id'];
        }
        if (!empty($data['blog_id']) && in_array($data['blog_id'], $data)) {
            $blog_id = $data['blog_id'];
         }
        if (!empty($data['branch_id']) && in_array($data['branch_id'], $data)) {
            $branch_id = $data['branch_id'];
         }

        $f->heading = $data['heading'];
        $f->content = $data['content'];
        $f->blog_id = $blog_id;
        $f->country_id = $data['country_id'];
        $f->lang = $data['lang'];
        $f->retailer_id = $retailer_id;
        $f->branch_id = $branch_id;
        
        $f->added_by = Auth::guard('admin')->id();

        $f->save();

        return $f->id;
    }

    public static function updateFAQ($id, array $data){

        $f = Faq::find($id);
        
        $f->heading = $data['heading'];
        $f->content = $data['content'];
        $f->country_id = $data['country_id'];
        $f->lang = $data['lang'];
        $f->save();

        return $f->id;

    }

    public function country(){
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }
}
