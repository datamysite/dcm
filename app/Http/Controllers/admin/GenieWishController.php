<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GenieWishRequests;
use App\Models\Wishcategories;

class GenieWishController extends Controller
{
    public function index(Request $request){
        $data['req'] = $request->all();
        $data['menu'] = 'web.users.genie-wish';
        if(!empty($data['req']['date_range'])){
            $date = explode(' - ', $data['req']['date_range']);
            $date[0] = str_replace('/', '-', $date[0]);
            $date[1] = str_replace('/', '-', $date[1]);
            $data['start_date'] = date('Y-m-d', strtotime($date[0]));
            $data['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime($date[1])));
        }
        //dd($data);
        $data['categories'] = Wishcategories::where('del', '0')->get();

        $data['requests'] = GenieWishRequests::when(!empty($data['req']['date_range']), function ($q) use ($data) {
                                                    return $q->whereBetween('created_at',[$data['start_date'], $data['end_date']] );
                                                })
                                                ->when(!empty($data['req']['category_id']), function($q) use ($data){
                                                    return $q->where('category_id', $data['req']['category_id']);     
                                                })
                                                ->when(!empty($data['req']['status']), function($q) use ($data){
                                                    return $q->where('status', $data['req']['status']);     
                                                })
                                                ->orderBy('status', 'asc')
                                                ->orderBy('created_at', 'desc')
                                                ->paginate('15');

        return view('admin.web_users.genie-wish.index')->with($data);
    }

    public function view($id){
        $id = base64_decode($id);

        $data['request'] = GenieWishRequests::find($id);

        return view('admin.web_users.genie-wish.details')->with($data);
    }

    public function approve($id){
        $id = base64_decode($id);

        $r = GenieWishRequests::find($id);
        $r->status = '2';
        $r->save();

        return 'success';
    }

    public function close($id){
        $id = base64_decode($id);

        $req = GenieWishRequests::find($id);
        $req->status = '3';
        $req->save();

        return 'success';
    }

    public function reject($id){
        $id = base64_decode($id);

        $data['request'] = GenieWishRequests::find($id);

        return view('admin.web_users.genie-wish.reject')->with($data);
    }


    public function rejectSubmit(Request $request){
        $data = $request->all();

        $req = GenieWishRequests::find(base64_decode($data['request_id']));
        $req->status = '4';
        $req->remarks = $data['reason'];
        $req->save();

        return redirect()->back()->with('success', 'Success!');
    }
}
