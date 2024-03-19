<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Contact_Us extends Model
{
    use HasFactory;

    protected $table = "contact_us";

    public static function create(array $data){

        $c = new Contact_Us;

        $c->name = $data['name'];
        $c->email = $data['email'];
        $c->phone = $data['phone'];
        $c->subject = $data['subject'];
        $c->msg = $data['msg'];
        $c->reply = $data['reply'];
        $c->replied_by = Auth::guard('admin')->id();
        $c->save();

        return $c->id;
    }
}
