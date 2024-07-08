<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'admin';
    
    protected $table = 'admin';

    protected $fillable = [
        'fullname',
        'username',
        'type',
        'created_by',
        'password',
        'is_active'
    ];

    public static function create(array $data){
        $u = new Admin;
        $u->fullname = $data['name'];
        $u->username = $data['username'];
        $u->designation = $data['designation'];
        $u->type = '1';
        $u->created_by = Auth::guard('admin')->id();
        $u->password = bcrypt($data['password']);
        $u->is_active = '1';
        $u->save();


        $u->assignRole($data['designation']);

        return $u->id;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function createdBy(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
