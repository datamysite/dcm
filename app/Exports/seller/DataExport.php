<?php

namespace App\Exports\seller;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Models\Retailers;
use App\Models\ClicksCounter;
use App\Models\Coupon;
use App\Models\Offers;
use Carbon\Carbon;
use Auth;
use DB;

class DataExport implements FromArray, withHeadings
{
    
    use Exportable;
    private $fromdate;
    private $todate;

    public function __construct($fromdate, $todate){
        $this->fromdate = $fromdate;
        $this->todate = $todate;
    }

    public function headings(): array
    {
        $headings = [];
        if(Auth::guard('seller')->user()->retailer->type == '1'){
            $headings = [
                '#',
                'Date',
                'Total Visiters',
                'Show Coupons',
                'Grab Deals'

            ];
        }else{
            $headings = [
                '#',
                'Date',
                'Total Visiters',
                'Offer Downloads',
                'Whatsapp Reach'

            ];
        }
        return $headings;
    }

    public function array(): array{
        //dd($this->fromdate);
        $daily_analytics = ClicksCounter::whereBetween('created_at', [date('Y-m-d', strtotime($this->fromdate)), date('Y-m-d', strtotime($this->todate))])
                                                ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                ->groupBy( 'type','date')
                                                ->orderBy('date', 'desc')
                                                ->get(array(
                                                    DB::raw('Date(created_at) as date'),
                                                    DB::raw('COUNT(*) as "visits"'),
                                                    DB::raw('type')
                                                ))->toArray();
        $ar_daily_analytics = array();

        foreach ( $daily_analytics as $value ) {
            $ar_daily_analytics[$value['date']][$value['type']] = $value['visits'];
        } 
        $data['data'] = array();
        $i = 0;
        foreach($ar_daily_analytics as $key => $val){
            $data['data'][$i][0] = $i+1;
            $data['data'][$i][1] = date('d-M-Y', strtotime($key));
            $i++;
        }

        $i = 0;
        foreach($ar_daily_analytics as $key => $val){
            $data['data'][$i][2] = empty($val['1']) ? '0' : $val['1'];
            $i++;
        }
        if(Auth::guard('seller')->user()->retailer->type == '1'){
            $i = 0;
            foreach($ar_daily_analytics as $key => $val){
                $data['data'][$i][3] = empty($val['2']) ? '0' : $val['2'];
                $i++;
            }
            $i = 0;
            foreach($ar_daily_analytics as $key => $val){
                $data['data'][$i][4] = empty($val['4']) ? '0' : $val['4'];
                $i++;
            }
        }else{
            $i = 0;
            foreach($ar_daily_analytics as $key => $val){
                $data['data'][$i][3] = empty($val['3']) ? '0' : $val['3'];
                $i++;
            }
            $i = 0;
            foreach($ar_daily_analytics as $key => $val){
                $data['data'][$i][4] = empty($val['5']) ? '0' : $val['5'];
                $i++;
            }
        }
        return $data;
    }
}
