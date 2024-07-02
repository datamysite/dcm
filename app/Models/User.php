<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\CashbackRequests;
use App\Models\GenieWishRequests;
use App\Models\WithdrawRequests;
use App\Models\TransactionHistory;
use App\Models\RewardType;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';


    public static function create(array $data){
        $u = new User;
        $u->name = $data['name'];
        $u->email = $data['email'];
        $u->email_otp = random_int(100000, 999999);
        $u->password = bcrypt($data['password']);
        $u->by_referral = empty($data['referral']) ? '' : $data['referral'];
        $u->save();

        if(!empty($data['referral'])){
            $ur = User::where('email', base64_decode($data['referral']))->first();
            if(!empty($u->id)){
                $r = RewardType::where('type', 'Referral')->first();
                $ur->wallet = $ur->wallet+$r->reward;
                $ur->save();

                $t = new TransactionHistory;
                $t->user_id = $ur->id;
                $t->coins = $r->reward;
                $t->type = 'referral';
                $t->trans_type = 'credit';
                $t->save();
            }
        }
        return $u;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'facebook_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function cashbackRequests()
    {
        return $this->hasMany(CashbackRequests::class, 'user_id');
    }

    public function WithdrawRequests()
    {
        return $this->hasMany(WithdrawRequests::class, 'user_id');
    }

    public function GenieWishRequests()
    {
        return $this->hasMany(GenieWishRequests::class, 'user_id');
    }

    public function TransactionHistory()
    {
        return $this->hasMany(TransactionHistory::class, 'user_id');
    }
}
