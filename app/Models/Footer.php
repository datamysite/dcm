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
        $f->page_name = empty($data['page_name']) ? '' : $data['page_name'];
        $f->page_url = empty($data['page_url']) ? '' : $data['page_url'];
        $f->retailer_id = empty($data['retailer_id']) ? '0' : $data['retailer_id'];
        $f->category_id = empty($data['category_id']) ? '0' : $data['category_id'];
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
