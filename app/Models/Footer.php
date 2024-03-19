<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Footer extends Model
{
    use HasFactory;

    protected $table = "footer";

    public static function create(array $data)
    {

        $f = new Footer;


        $f->section_id = $data['section_id'];

        if ($data['page_name'] != '') {
            $f->page_name = $data['page_name'];
        } else {
            $f->page_name = 'none';
        }

        $f->page_url = $data['page_url'];
        $f->retailer_id = $data['retailer_id'];
        $f->category_id = $data['category_id'];
        $f->created_by = Auth::guard('admin')->id();
        $f->save();

        return $f->id;
    }

    public function retailerName()
    {
        return $this->belongsTo(Retailers::class, 'retailer_id');
    }


    public function categoiresName()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

}
