<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClicksCounter;
use App\Models\Retailers;
use App\Models\User;
use App\Models\Blogs;
use App\Models\Testimonials;
use App\Models\WithdrawRequests;
use App\Models\GenieWishRequests;

class MainController extends Controller
{
    public function index(){
        $data['menu'] = 'dashboard';
        $data['start_date'] = date('Y-m-d', strtotime('-30 days'));
        $data['end_date'] = date('Y-m-d', strtotime('+1 days'));

        return view('admin.dashboard')->with($data);
    }

    public function get_widgets(){
        $uae = array('Dubai', 'Abu Dhabi', 'Ajman', 'Sharjah', 'Fujairah', 'Ras Al-Khaimah', 'Umm Al Quwain');

        $data['pending_request_c'] = number_format(WithdrawRequests::where('status', '1')->count());
        $data['pending_request_g'] = number_format(GenieWishRequests::where('status', '1')->count());

        $data['pending_value_c'] = number_format(WithdrawRequests::where('status', '1')->sum('amount'));
        $data['pending_value_g'] = number_format(GenieWishRequests::where('status', '1')->sum('amount'));

        $data['approve_value_c'] = number_format(WithdrawRequests::where('status', '3')->sum('amount'));
        $data['approve_value_g'] = number_format(GenieWishRequests::where('status', '3')->sum('amount'));


        $data['online_stores'] = number_format(Retailers::where('type', '1')->count());
        $data['show_coupons'] = number_format(ClicksCounter::where('type', '2')->count());
        $data['grab_deals'] = number_format(ClicksCounter::where('type', '4')->count());

        $data['retail_stores'] = number_format(Retailers::where('type', '2')->count());
        $data['downloads'] = number_format(ClicksCounter::where('type', '3')->count());
        $data['whatsapp'] = number_format(ClicksCounter::where('type', '5')->count());

        $data['registered_users'] = number_format(User::count());
        $data['total_blogs'] = number_format(Blogs::count());
        $data['total_reviews'] = number_format(Testimonials::count());

        return json_encode($data);
    }

    public function get_recent_activities(){
        echo '<table class="table table-striped">';

        ClicksCounter::limit(21)->orderBy('id', 'desc')->get()->each(function (ClicksCounter $c) {
            echo '<tr><td>'.$c->retailer->name.'</td><td class="text-center">';
                switch ($c->type) {
                    case '1':
                        echo '<span class="badge badge-recent badge-primary">Page visit</span>';
                        break;

                    case '2':
                        echo '<span class="badge badge-recent badge-info">Show Coupon</span>';
                        break;

                    case '4':
                        echo '<span class="badge badge-recent badge-success">Grab Deal</span>';
                        break;

                    case '3':
                        echo '<span class="badge badge-recent badge-info">Download</span>';
                        break;

                    case '5':
                        echo '<span class="badge badge-recent badge-success">Whatsapp</span>';
                        break;
                    
                    default:
                        // code...
                        break;
                }

            echo            '</td><td class=" float-right"><small>'.$c->created_at->diffForHumans().'</small></td>
                      </tr>';
        });
        echo '</table>';
    }
}
