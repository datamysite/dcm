<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\ClicksCounter;

class AnalyticsController extends Controller
{
    public function increase_analytics($s){
        $ret = 102;

        /*$fdump_data[0] = array(
            array(11, 9, 1, '2024-12-01'),
            array(05, 8, 2, '2024-12-02'),
            array(06, 0, 1, '2024-12-03'),
            array(03, 1, 0, '2024-12-04'),
            array(02, 7, 0, '2024-12-05'),
            array(13, 2, 1, '2024-12-06'),
            array(10, 0, 0, '2024-12-07'),
            array(16, 8, 1, '2024-12-08'),
            array(15, 3, 2, '2024-12-09'),
            array(24, 9, 0, '2024-12-10')
        );
        $fdump_data[1] = array(
            array(49, 1, 1, '2024-12-11'),
            array(48, 8, 0, '2024-12-12'),
            array(17, 1, 2, '2024-12-13'),
            array(98, 3, 0, '2024-12-14'),
            array(97, 9, 1, '2024-12-15'),
            array(23, 1, 1, '2024-12-16'),
            array(82, 9, 0, '2024-12-17'),
            array(22, 3, 0, '2024-12-18'),
            array(36, 3, 0, '2024-12-19'),
            array(23, 3, 0, '2024-12-20'),
        );
        $fdump_data[2] = array(
            array(65, 8, 0, '2024-12-21'),
            array(23, 1, 0, '2024-12-22'),
            array(36, 3, 0, '2024-12-23')
        );


        $dump_data = $fdump_data[$s];

            $coup = array();

            $coupons = Coupon::where('retailer_id', $ret)->where('status', '1')->get();
            foreach ($coupons as $key => $value) {
                $coup[] = $value->id;
            }

        foreach($dump_data as $val){
            $para = $val;
            $tim = $para[3].' '.rand(10, 23).':'.rand(10, 59).':'.rand(10, 59);

            for($i=0; $i<$para[0]; $i++){
                $c = new ClicksCounter;
                $c->retailer_id = $ret;
                $c->type = '1';
                $c->country = 'AE';
                $c->region = 'Dubai';
                $c->city = 'Dubai';
                $c->created_at = $tim;
                $c->updated_at = $tim;
                $c->save();
            }
            echo 'Total Trafic Update: '.$para[0].'<br><br>';

            for($i=0; $i<$para[1]; $i++){
                $c = new ClicksCounter;
                $c->retailer_id = $ret;
                $c->coupon_id = $coup[array_rand($coup,1)];
                $c->type = '2';
                $c->country = 'AE';
                $c->region = 'Dubai';
                $c->city = 'Dubai';
                $c->created_at = $tim;
                $c->updated_at = $tim;
                $c->save();
            }
            echo 'Total Trafic Update: '.$para[1].'<br><br>';


            for($i=0; $i<$para[2]; $i++){
                $c = new ClicksCounter;
                $c->retailer_id = $ret;
                $c->coupon_id = $coup[array_rand($coup,1)];
                $c->type = '4';
                $c->country = 'AE';
                $c->region = 'Dubai';
                $c->city = 'Dubai';
                $c->created_at = $tim;
                $c->updated_at = $tim;
                $c->save();
            }
            echo 'Total Trafic Update: '.$para[2].'<br><br>';
        }*/
    }
}
