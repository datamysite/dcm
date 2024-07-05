<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\States;
use App\Models\Countries;
use GuzzleHttp\Client;
use Config;

class RegionController extends Controller
{
    public function index(){


        $userIp = RegionController::getIPAddress();
        $client = new Client();
        $response = $client->get("https://proxycheck.io/v2/{$userIp}?key=".config('app.proxycheck')."&vpn=1&asn=1");
        $data = json_decode($response->getBody(), true);

        $defaulState = array('','dubai', 'riyadh');
        $states[1] = array('Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman', 'Ras Al-Khaimah', 'Fujairah', 'Umm Al-Quwain');
        $states[2] = array('Jeddah', 'Riyadh', 'Makkah', 'Madinah', 'Dammam', 'Khobar');

        if ((function_exists('session_status') 
          && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
          session_start();
        }
        if(!empty($data[$userIp]['region']) && in_array($data[$userIp]['region'], $states[config('app.country')])){
            $st = States::where('name', $data[$userIp]['region'])->first();
            if(!empty($st->id)){
                $region = $st->slug;
                $_SESSION['region'] = $st->slug;
            }else{
                $region = $defaulState[config('app.country')];
                $_SESSION['region'] = $defaulState[config('app.country')];
            }
        }else{
            $region = $defaulState[config('app.country')];
            $_SESSION['region'] = $defaulState[config('app.country')];
        }

        return redirect()->intended('/'.app()->getLocale().'/'.$region);
    }

    public function set_region($lang, $name){

        if ((function_exists('session_status') 
          && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
          session_start();
        }
        $_SESSION['region'] = $name;

        $region = $_SESSION['region'];
        //dd($_SESSION['region']);

        return redirect()->intended('/'.app()->getLocale().'/'.$region);
    }


    public function get_location(){
        $userIp = RegionController::getIPAddress();
        $client = new Client();
        $response = $client->get("https://proxycheck.io/v2/{$userIp}?key=".config('app.proxycheck')."&vpn=1&asn=1");
        $idata = json_decode($response->getBody(), true);

        $country = Countries::where('shortname_2', $idata[$userIp]['isocode'])->first();

        if(empty($country->id) || $country->id != config('app.country')){
            $data['country'] = $country;
            if(config('app.country') == '1'){
                $data['ci1'] = '1';
                $data['c1'] = 'UAE';
                $data['cl1'] = 'https://dealsandcouponsmena.ae';

                $data['ci2'] = '2';
                $data['c2'] = 'KSA';
                $data['cl2'] = 'https://dealsandcouponsmena.com';
            }else{

                $data['ci1'] = '2';
                $data['c1'] = 'KSA';
                $data['cl1'] = 'https://dealsandcouponsmena.com';

                $data['ci2'] = '1';
                $data['c2'] = 'UAE';
                $data['cl2'] = 'https://dealsandcouponsmena.ae';
            }


            return view('web.content.modal.countryChange')->with($data);
        }else{
            return "pass";
        }

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

    public function get_lang(){

        $userIp = RegionController::getIPAddress();
        $client = new Client();
        $response = $client->get("https://proxycheck.io/v2/{$userIp}?key=".config('app.proxycheck')."&vpn=1&asn=1");
        $data = json_decode($response->getBody(), true);

        $defaulState = array('','dubai', 'riyadh');
        $states[1] = array('Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman', 'Ras Al-Khaimah', 'Fujairah', 'Umm Al-Quwain');
        $states[2] = array('Jeddah', 'Riyadh', 'Makkah', 'Madinah', 'Dammam', 'Khobar');

        if ((function_exists('session_status') 
          && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
          session_start();
        }
        if(!empty($data[$userIp]['region']) && in_array($data[$userIp]['region'], $states[config('app.country')])){
            $st = States::where('name', $data[$userIp]['region'])->first();
            if(!empty($st->id)){
                $region = $st->slug;
                $_SESSION['region'] = $st->slug;
            }else{
                $region = $defaulState[config('app.country')];
                $_SESSION['region'] = $defaulState[config('app.country')];
            }
        }else{
            $region = $defaulState[config('app.country')];
            $_SESSION['region'] = $defaulState[config('app.country')];
        }
        
        return redirect()->intended('/'.app()->getLocale().'/'.$region);
    }
}
