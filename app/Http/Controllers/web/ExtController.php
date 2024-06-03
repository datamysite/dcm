<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use GuzzleHttp\Client;

class ExtController extends Controller
{
    public function index($lang, $url)
    {
        $data['url'] = $url;
        $userIp = ExtController::getIPAddress();
        $client = new Client();
        $response = $client->get("https://ipinfo.io/".$userIp."?token=".config('app.ipinfo'));
        $idata = json_decode($response->getBody());

        $country = Countries::where('shortname_2', $idata->country)->first();

        if(!empty($country->id)){
            if($country->id == '1'){
                $data['country_id'] = '1';
                $data['state_name'] = 'dubai';
                $data['host_name'] = 'https://dealsandcouponsmena.ae/';

            }elseif($country->id == '2'){
                $data['country_id'] = '2';
                $data['state_name'] = 'riyadh';
                $data['host_name'] = 'https://dealsandcouponsmena.com/';

            }

        }else{
            $data['country_id'] = '1';
            $data['state_name'] = 'dubai';
            $data['host_name'] = 'https://dealsandcouponsmena.ae/';
        }

        return view('web.extension.index')->with($data);
    }


    public function getIPAddress() {   
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
