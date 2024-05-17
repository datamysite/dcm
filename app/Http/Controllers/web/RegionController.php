<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\States;
use GuzzleHttp\Client;
use Config;

class RegionController extends Controller
{
    public function index(){


        $userIp = RegionController::getIPAddress();
        $client = new Client();
        $response = $client->get("https://ipinfo.io/{$userIp}?token=91b28de1f957f7");
        $data = json_decode($response->getBody());

        $defaulState = array('','dubai', 'riyadh');
        $states = array('Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman', 'Ras Al-Khaimah', 'Fujairah', 'Umm Al-Quwain');

        if(!isset($_SESSION['region'])){
            session_start();
        }
        if(!empty($data->region) && in_array($data->region, $states)){
            $st = States::where('name', $data->region)->first();
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

        if(!isset($_SESSION['region'])){
            session_start();
        }
        $_SESSION['region'] = $name;

        $region = $_SESSION['region'];
        //dd($_SESSION['region']);

        return redirect()->intended('/'.app()->getLocale().'/'.$region);
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
        $response = $client->get("https://ipinfo.io/{$userIp}?token=91b28de1f957f7");
        $data = json_decode($response->getBody());

        $defaulState = array('','dubai', 'riyadh');
        $states = array('Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman', 'Ras Al-Khaimah', 'Fujairah', 'Umm Al-Quwain');

        if(!isset($_SESSION['region'])){
            session_start();
        }
        if(!empty($data->region) && in_array($data->region, $states)){
            $st = States::where('name', $data->region)->first();
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
