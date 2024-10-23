<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function increase_analytics(){
        $ret = 102;

        $dump_data = array(
            array(432, 242, 144, '2024-09-16'),
            array(1185, 664, 394, '2024-09-17'),
            array(917, 512, 306, '2024-09-18'),
            array(945, 587, 313, '2024-09-19'),
            array(1143, 634, 373, '2024-09-20'),
            array(943, 589, 304, '2024-09-21'),
            array(610, 387, 204, '2024-09-22'),
            array(1168, 698, 399, '2024-09-23'),
            array(915, 503, 306, '2024-09-24'),
            array(924, 519, 316, '2024-09-25'),
            array(949, 521, 322, '2024-09-26'),
            array(948, 598, 332, '2024-09-27'),
            array(917, 531, 316, '2024-09-28'),
            array(998, 573, 306, '2024-09-29'),
            array(997, 549, 409, '2024-09-30'),
            array(1223, 691, 488, '2024-10-01'),
            array(1282, 629, 436, '2024-10-02'),
            array(1222, 683, 428, '2024-10-03'),
            array(1236, 653, 432, '2024-10-04'),
            array(1323, 703, 441, '2024-10-05'),
            array(1265, 598, 434, '2024-10-06'),
            array(623, 321, 217, '2024-10-07'),
            array(1336, 893, 434, '2024-10-08'),
            array(833, 467, 271, '2024-10-09'),
        );


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
