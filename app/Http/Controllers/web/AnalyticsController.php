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

        $fdump_data[0] = array(
            array(111, 19, 1, '2024-11-01'),
            array(105, 18, 3, '2024-11-02'),
            array(106, 20, 5, '2024-11-03'),
            array(103, 21, 2, '2024-11-04'),
            array(102, 17, 1, '2024-11-05'),
            array(113, 22, 4, '2024-11-06'),
            array(110, 20, 1, '2024-11-07'),
            array(116, 98, 9, '2024-11-08'),
            array(115, 03, 6, '2024-11-09'),
            array(124, 19, 6, '2024-11-10')
        );
        $fdump_data[1] = array(
            array(149, 21, 2, '2024-11-11'),
            array(148, 98, 2, '2024-11-12'),
            array(117, 31, 6, '2024-11-13'),
            array(198, 73, 6, '2024-11-14'),
            array(197, 49, 9, '2024-11-15'),
            array(123, 91, 8, '2024-11-16'),
            array(182, 29, 6, '2024-11-17'),
            array(122, 83, 8, '2024-11-18'),
            array(136, 53, 2, '2024-11-19'),
            array(123, 03, 1, '2024-11-20'),
            array(165, 98, 4, '2024-11-21'),
            array(123, 21, 7, '2024-11-22'),
            array(136, 93, 4, '2024-11-23'),
            array(133, 37, 1, '2024-11-24'),
            array(123, 57, 6, '2024-11-25'),
            array(173, 37, 7, '2024-11-26'),
            array(103, 57, 4, '2024-11-27'),
            array(153, 27, 7, '2024-11-28'),
            array(133, 87, 2, '2024-11-29'),
            array(113, 27, 9, '2024-11-30'),
        );
        $fdump_data[2] = array(
            array(165, 98, 4, '2024-11-21'),
            array(123, 21, 7, '2024-11-22'),
            array(136, 93, 4, '2024-11-23'),
            array(133, 37, 1, '2024-11-24'),
            array(123, 57, 6, '2024-11-25'),
            array(173, 37, 7, '2024-11-26'),
            array(103, 57, 4, '2024-11-27'),
            array(153, 27, 7, '2024-11-28'),
            array(133, 87, 2, '2024-11-29'),
            array(113, 27, 9, '2024-11-30')
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
        }
    }
}
