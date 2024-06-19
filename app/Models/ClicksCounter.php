<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use App\Models\Retailers;
use App\Models\Coupon;
use App\Models\Offers;

class ClicksCounter extends Model
{
    use HasFactory;

    protected $table = 'clicks_counter';


    public static function hitCount($type, $id, $coup_id = null, $coup_type = null){
        //dd($coup_type);
        $userIp = ClicksCounter::getIPAddress();

        $ipset = explode('.', $userIp);
        if($ipset[0] != "66" && $ipset[1] != "249" && $userIp != "216.144.248.29"){

            $client = new Client();
             $response = $client->get("https://ipinfo.io/{$userIp}?token=".config('app.ipinfo'));
             $data = json_decode($response->getBody());


             $cc = new ClicksCounter;
             $cc->retailer_id = $id;
             if($coup_type == '1'){
                $cc->coupon_id = $coup_id;
             }elseif($coup_type == '2'){
                $cc->offer_id = $coup_id;
             }
             $cc->type = $type;
             $cc->ipaddress = $data->ip;
             $cc->coordinates = empty($data->loc) ? '' : $data->loc;
             $cc->country = empty($data->country) ? '' : $data->country;
             $cc->region = empty($data->region) ? '' : $data->region;
             $cc->city = empty($data->city) ? '' : $data->city;
             $cc->save();
        }
    }


    public static function getIPAddress() {   
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    } 



    public function retailer(){
        return $this->belongsTo(Retailers::class, 'retailer_id', 'id');
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }

    public function offer(){
        return $this->belongsTo(Offers::class, 'offer_id', 'id');
    }
}
