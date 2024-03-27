<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AppliedVacancies;
use Auth;

class Vacancies extends Model
{
    use HasFactory;

    protected $table = "vacancies";

    public static function create(array $data){

        $v = new Vacancies;
        $v->title = $data['title'];
        $v->desc = $data['job_desc'];
        $v->salary_from = $data['salary_from'];
        $v->salary_to = $data['salary_to'];
        $v->end_date = date('Y-m-d', strtotime($data['end_date']));
        $v->status = $data['status'];
        $v->created_by = Auth::guard('admin')->id();
        $v->save();

        return $v->id;
        
    }


    public function applications(){
        return $this->hasMany(AppliedVacancies::class, 'vacancie_id', 'id');
    }

    
}
