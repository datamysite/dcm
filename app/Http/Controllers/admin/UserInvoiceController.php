<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CashbackRequests;
use App\Models\RewardType;
use App\Models\User;
use App\Models\TransactionHistory;

class UserInvoiceController extends Controller
{
    public function index(Request $request){
        $data['req'] = $request->all();
        $data['menu'] = 'web.users.invoices';
        if(!empty($data['req']['date_range'])){
            $date = explode(' - ', $data['req']['date_range']);
            $date[0] = str_replace('/', '-', $date[0]);
            $date[1] = str_replace('/', '-', $date[1]);
            $data['start_date'] = date('Y-m-d', strtotime($date[0]));
            $data['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime($date[1])));
        }
        //dd($data);

        $data['requests'] = CashbackRequests::when(!empty($data['req']['date_range']), function ($q) use ($data) {
                                                    return $q->whereBetween('created_at',[$data['start_date'], $data['end_date']] );
                                                })
                                                ->when(!empty($data['req']['status']), function($q) use ($data){
                                                    return $q->where('status', $data['req']['status']);     
                                                })
                                                ->orderBy('status', 'asc')
                                                ->orderBy('created_at', 'desc')
                                                ->paginate('15');

        return view('admin.web_users.invoices.index')->with($data);
    }

    public function approve($id){
        $id = base64_decode($id);

        $parameter = RewardType::where('type', 'Purchase')->first();

        $r = CashbackRequests::find($id);
        $r->status = '2';
        $r->save();

        $u = User::find($r->user_id);
        $u->wallet = $u->wallet+$parameter->reward;
        $u->save();

        $t = new TransactionHistory;
        $t->user_id = $u->id;
        $t->coins = $parameter->reward;
        $t->type = 'purchase';
        $t->trans_type = 'credit';
        $t->save();

        return 'success';
    }

    public function reject($id){
        $id = base64_decode($id);

        
        $r = CashbackRequests::find($id);
        $r->status = '3';
        $r->save();

        return 'success';
    }

}
