<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedVacancies extends Model
{
    use HasFactory;
    protected $table = "applied_vacancies";

    public static function create(array $data){

        $v = new AppliedVacancies;
        $v->vacancie_id = $data['vac_id'];
        $v->user_id = $data['user_id'];
        $v->save();

        return $v->id;
        
    }


    public function userDetails()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
