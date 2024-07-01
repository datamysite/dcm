<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class BankAccounts extends Model
{
    use HasFactory;
    protected $table = "bank_account_details";


    public static function create(array $data){
        
        $user_id =  Auth::user()->id;

        $c = new BankAccounts;
        $c->bank_id = $data['bank_id'];
        $c->user_id = $user_id;
        $c->account_holder_name = $data['bnk_account_name'];
        $c->iban = $data['bnk_iban'];
        $c->account_number = $data['bnk_account_number'];

        $c->save();

        return $c->id;
    }
}
