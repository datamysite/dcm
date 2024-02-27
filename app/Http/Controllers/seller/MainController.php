<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClicksCounter;
use App\Models\Coupon;
use App\Models\Offers;
use Carbon\Carbon;
use Auth;
use DB;

class MainController extends Controller
{
    public function index(){
        $data['menu'] = 'dashboard';
        $data['total_traffic'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '1')->count();

        if(Auth::guard('seller')->user()->retailer->type == '1'){
            $data['total_show_coupon'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '2')->count();
            $data['total_grab_deal'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '4')->count();
            $data['active_coupons'] = Coupon::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('status', '1')->count();

            $data['coupon_analytics'] = ClicksCounter::with('coupon')
                                                        ->where('type', '2')
                                                        ->where('coupon_id', '!=', null)
                                                        ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                        ->select('coupon_id', DB::raw('count(*) as total'))
                                                        ->groupBy('coupon_id')
                                                        ->get();

            $data['grabDeal_analytics'] = ClicksCounter::with('coupon')
                                                        ->where('type', '4')
                                                        ->where('coupon_id', '!=', null)
                                                        ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                        ->select('coupon_id', DB::raw('count(*) as total'))
                                                        ->groupBy('coupon_id')
                                                        ->get();

        }elseif (Auth::guard('seller')->user()->retailer->type == '2') {
            $data['total_downloads'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '3')->count();
            $data['total_whatsapp_visits'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '5')->count();
            $data['active_offers'] = Offers::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->count();
        }

        $data['visiter_regional'] = ClicksCounter::select('region', DB::raw('count(*) as total'))->where('type', '1')->where('retailer_id', Auth::guard('seller')->user()->retailer_id)->groupBy('region')->orderBy('region', 'desc')->get()->toArray();
        
        $data['visiter_regional'] = array_column($data['visiter_regional'], 'total', 'region');

        $daily_analytics = ClicksCounter::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
                                                ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                ->groupBy( 'type','date')
                                                ->orderBy('date', 'asc')
                                                ->get(array(
                                                    DB::raw('Date(created_at) as date'),
                                                    DB::raw('COUNT(*) as "visits"'),
                                                    DB::raw('type')
                                                ))->toArray();

        $data['daily_analytics'] = array();

        foreach ( $daily_analytics as $value ) {
            $data['daily_analytics'][$value['date']][$value['type']] = $value['visits'];
        } 

        //dd($data['daily_analytics']);
        return view('seller.dashboard')->with($data);
    }
}
