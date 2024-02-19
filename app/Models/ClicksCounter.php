<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class ClicksCounter extends Model
{
    use HasFactory;

    protected $table = 'clicks_counter';


    public static function hitCount($type, $id){

        $userIp = ClicksCounter::getIPAddress();
        $client = new Client();
         $response = $client->get("https://ipinfo.io/{$userIp}?token=91b28de1f957f7");
         $data = json_decode($response->getBody());

         $cc = new ClicksCounter;
         $cc->retailer_id = $id;
         $cc->type = $type;
         $cc->ipaddress = $data->ip;
         $cc->coordinates = empty($data->loc) ? '' : $data->loc;
         $cc->country = empty($data->country) ? '' : $data->country;
         $cc->region = empty($data->region) ? '' : $data->region;
         $cc->city = empty($data->city) ? '' : $data->city;
         $cc->save();

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
}
