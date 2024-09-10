<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClicksCounter;
use App\Models\OfferQrCode;
use App\Models\Coupon;
use App\Models\Offers;
use Carbon\Carbon;
use Auth;
use DB;

class MainController extends Controller
{
    public function index(){
        $data['menu'] = 'dashboard';
        $data['start_date'] = date('Y-m-d', strtotime('-30 days'));
        if(strtotime($data['start_date']) < strtotime(Auth::guard('seller')->user()->retailer->created_at)){
            $data['start_date'] = date('Y-m-d', strtotime(Auth::guard('seller')->user()->retailer->created_at));
        }
        $data['end_date'] = date('Y-m-d', strtotime('+1 days'));
        $data['total_traffic'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '1')->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->count();

        if(Auth::guard('seller')->user()->retailer->type == '1'){
            $data['total_show_coupon'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '2')->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->count();
            $data['total_grab_deal'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '4')->whereBetween('created_at', [$data['start_date'], $data['end_date']])->count();
            $data['active_coupons'] = Coupon::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('status', '1')->count();

            $data['coupon_analytics'] = ClicksCounter::with('coupon')
                                                    ->where('type', '2')
                                                    ->where('coupon_id', '!=', null)
                                                    ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                    ->whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                    ->select('coupon_id', DB::raw('count(*) as total'))
                                                    ->groupBy('coupon_id')
                                                    ->get();

            $data['grabDeal_analytics'] = ClicksCounter::with('coupon')
                                                    ->where('type', '4')
                                                    ->where('coupon_id', '!=', null)
                                                    ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                    ->whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                    ->select('coupon_id', DB::raw('count(*) as total'))
                                                    ->groupBy('coupon_id')
                                                    ->get();

        }elseif (Auth::guard('seller')->user()->retailer->type == '2') {
            $data['total_downloads'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '3')->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->count();
            $data['total_whatsapp_visits'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '5')->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->count();
            $data['active_offers'] = Offers::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->count();
            $data['total_redeems'] = OfferQrCode::whereHas('offer', function($q){
                                                  return $q->where('retailer_id', Auth::guard('seller')->user()->retailer_id);  
                                                })
                                                ->where('status', '1')
                                                ->whereBetween('updated_at', [$data['start_date'], $data['end_date']])->count();

            $data['offer_analytics'] = ClicksCounter::with('offer')
                                                    ->where('type', '3')
                                                    ->where('offer_id', '!=', null)
                                                    ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                    ->whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                    ->select('offer_id', DB::raw('count(*) as total'))
                                                    ->groupBy('offer_id')
                                                    ->get();

            $data['whatsapp_analytics'] = ClicksCounter::with('offer')
                                                    ->where('type', '5')
                                                    ->where('offer_id', '!=', null)
                                                    ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                    ->whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                    ->select('offer_id', DB::raw('count(*) as total'))
                                                    ->groupBy('offer_id')
                                                    ->get();
        }

        $data['visiter_regional'] = ClicksCounter::select('region', DB::raw('count(*) as total'))->where('type', '1')->where('retailer_id', Auth::guard('seller')->user()->retailer_id)->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->groupBy('region')->orderBy('region', 'desc')->get()->toArray();
        
        $data['visiter_regional'] = array_column($data['visiter_regional'], 'total', 'region');

        $daily_analytics = ClicksCounter::whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                ->groupBy('type', 'date')
                                                ->orderBy('date', 'asc')
                                                ->get(array(
                                                    DB::raw('Date(created_at) as date'),
                                                    DB::raw('COUNT(*) as "visits"'),
                                                    DB::raw('type')
                                                ))->toArray();

        //dd($daily_analytics);
        $data['daily_analytics'] = array();

        foreach ( $daily_analytics as $value ) {
            $data['daily_analytics'][$value['date']][$value['type']] = $value['visits'];
        } 
        $data['end_date'] = date('Y-m-d');
        return view('seller.dashboard')->with($data);
    }


    public function dashboard_filter(Request $request){
        $data['menu'] = 'dashboard';
        $req = $request->all();
        $date = explode(' - ', $req['date_range']);
        $date[0] = str_replace('/', '-', $date[0]);
        $date[1] = str_replace('/', '-', $date[1]);
        $data['start_date'] = date('Y-m-d', strtotime($date[0]));
        $data['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime($date[1])));
        //dd($data);
        $data['total_traffic'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '1')->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->count();

        if(Auth::guard('seller')->user()->retailer->type == '1'){
            $data['total_show_coupon'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '2')->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->count();
            $data['total_grab_deal'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '4')->whereBetween('created_at', [$data['start_date'], $data['end_date']])->count();
            $data['active_coupons'] = Coupon::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('status', '1')->whereBetween('created_at', [$data['start_date'], $data['end_date']])->count();

            $data['coupon_analytics'] = ClicksCounter::with('coupon')
                                                    ->where('type', '2')
                                                    ->where('coupon_id', '!=', null)
                                                    ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                    ->whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                    ->select('coupon_id', DB::raw('count(*) as total'))
                                                    ->groupBy('coupon_id')
                                                    ->get();

            $data['grabDeal_analytics'] = ClicksCounter::with('coupon')
                                                    ->where('type', '4')
                                                    ->where('coupon_id', '!=', null)
                                                    ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                    ->whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                    ->select('coupon_id', DB::raw('count(*) as total'))
                                                    ->groupBy('coupon_id')
                                                    ->get();

        }elseif (Auth::guard('seller')->user()->retailer->type == '2') {
            $data['total_downloads'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '3')->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->count();
            $data['total_whatsapp_visits'] = ClicksCounter::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->where('type', '5')->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->count();
            $data['active_offers'] = Offers::where('retailer_id', Auth::guard('seller')->user()->retailer_id)->count();
            $data['total_redeems'] = OfferQrCode::whereHas('offer', function($q){
                                                  return $q->where('retailer_id', Auth::guard('seller')->user()->retailer_id);  
                                                })
                                                ->where('status', '1')
                                                ->whereBetween('updated_at', [$data['start_date'], $data['end_date']])->count();

            $data['offer_analytics'] = ClicksCounter::with('offer')
                                                    ->where('type', '3')
                                                    ->where('offer_id', '!=', null)
                                                    ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                    ->whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                    ->select('offer_id', DB::raw('count(*) as total'))
                                                    ->groupBy('offer_id')
                                                    ->get();

            $data['whatsapp_analytics'] = ClicksCounter::with('offer')
                                                    ->where('type', '5')
                                                    ->where('offer_id', '!=', null)
                                                    ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                    ->whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                    ->select('offer_id', DB::raw('count(*) as total'))
                                                    ->groupBy('offer_id')
                                                    ->get();
        }

        $data['visiter_regional'] = ClicksCounter::select('region', DB::raw('count(*) as total'))->where('type', '1')->where('retailer_id', Auth::guard('seller')->user()->retailer_id)->whereBetween('created_at',[$data['start_date'], $data['end_date']] )->groupBy('region')->orderBy('region', 'desc')->get()->toArray();
        
        $data['visiter_regional'] = array_column($data['visiter_regional'], 'total', 'region');

        $daily_analytics = ClicksCounter::whereBetween('created_at',[$data['start_date'], $data['end_date']] )
                                                ->where('retailer_id', Auth::guard('seller')->user()->retailer_id)
                                                ->groupBy('type', 'date')
                                                ->orderBy('date', 'asc')
                                                ->get(array(
                                                    DB::raw('Date(created_at) as date'),
                                                    DB::raw('COUNT(*) as "visits"'),
                                                    DB::raw('type')
                                                ))->toArray();

        //dd($daily_analytics);
        $data['daily_analytics'] = array();

        foreach ( $daily_analytics as $value ) {
            $data['daily_analytics'][$value['date']][$value['type']] = $value['visits'];
        } 
        $data['end_date'] = date('Y-m-d', strtotime($date[1]));
        return view('seller.dashboard')->with($data);
    }
}
