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

        if(!empty($ipset[0]) && !empty($ipset[1])){
            if(($ipset[0] != "66" && $ipset[1] != "249") && $userIp != "216.144.248.28"){

                $client = new Client();
                 $response = $client->get("https://proxycheck.io/v2/{$userIp}?key=".config('app.proxycheck')."&vpn=1&asn=1");
                 //$response = $client->get("https://ipinfo.io/{$userIp}?token=".config('app.ipinfo'));
                 $data = json_decode($response->getBody(), true);

                 $cc = new ClicksCounter;
                 $cc->retailer_id = $id;
                 if($coup_type == '1'){
                    $cc->coupon_id = $coup_id;
                 }elseif($coup_type == '2'){
                    $cc->offer_id = $coup_id;
                 }
                 $cc->type = $type;
                 $cc->ipaddress = $userIp;
                 $cc->coordinates = empty($data[$userIp]['latitude']) ? '' : $data[$userIp]['latitude'].','.$data[$userIp]['longitude'];
                 $cc->country = empty($data[$userIp]['isocode']) ? '' : $data[$userIp]['isocode'];
                 $cc->region = empty($data[$userIp]['region']) ? '' : $data[$userIp]['region'];
                 $cc->city = empty($data[$userIp]['city']) ? '' : $data[$userIp]['city'];
                 $cc->save();
            }
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
