<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;
use Auth;

class SnippetCode extends Model
{
    use HasFactory;

    protected $table = 'snippet_code';

    public static function create(array $data){
        $c = new SnippetCode;
        $c->name = $data['name'];
        $c->position = $data['position'];
        $c->page_url = empty($data['page_url']) ? '' : $data['page_url'];
        $c->snippet_code = $data['snippet_code'];
        $c->country_id = $data['country_id'];
        $c->created_by = Auth::guard('admin')->id();
        $c->save();

        return $c->id;
    }

    public static function snippet_update($id, array $data){
        $c = SnippetCode::find($id);
        $c->name = $data['name'];
        $c->position = $data['position'];
        $c->page_url = empty($data['page_url']) ? '' : $data['page_url'];
        $c->snippet_code = $data['snippet_code'];
        $c->country_id = $data['country_id'];
        $c->save();

        return $c->id;
    }

    public function country(){
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }
}
