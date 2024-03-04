<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;

class RegionController extends Controller
{
    public function index(){

        if(!isset($_SESSION['region'])){
            session_start();
            $_SESSION['region'] = 'dubai';
        }

        $region = $_SESSION['region'];

        return redirect()->intended('/'.$region);
    }

    public function set_region($name){

        if(!isset($_SESSION['region'])){
            session_start();
        }
        $_SESSION['region'] = $name;

        $region = $_SESSION['region'];
        //dd($_SESSION['region']);

        return redirect()->intended('/'.$region);
    }
}
