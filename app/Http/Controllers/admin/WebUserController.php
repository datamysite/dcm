<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\admin\UserExport;
use App\Models\User;

class WebUserController extends Controller
{
    public function index(){
        $data['menu'] = 'web.users';

        return view('admin.web_users.index')->with($data);
    }

    public function load(){
        $response = [];
        $data = User::orderBy('id', 'desc')->get();
        
        return view('admin.web_users.load', ['data' => $data]);
    }

    public function user_filter(Request $request){
        $data = $request->all();

        if(!empty($data['date_range'])){
            $date = explode(' - ', $data['date_range']);
            $date[0] = str_replace('/', '-', $date[0]);
            $date[1] = str_replace('/', '-', $date[1]);
            $data['start_date'] = date('Y-m-d', strtotime($date[0]));
            $data['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime($date[1])));
        }

        $data['data'] = User::when(!empty($data['date_range']), function ($q) use ($data) {
                                return $q->whereBetween('created_at',[$data['start_date'], $data['end_date']] );
                            })->when(!empty($data['email_verified']) || $data['email_verified'] == '0', function ($q) use ($data) {
                                return $q->where('email_verified', $data['email_verified']);
                            })->get();

        return view('admin.web_users.load')->with($data);
    }

    public function user_export(Request $request){
        $dat = $request->all();
        $data['start_date'] = null;
        $data['end_date'] = null;
        $data['email_verified'] = null;

        if(!empty($dat['email_verified'])){
            $data['email_verified'] = $dat['email_verified'];
        }
        if(!empty($dat['date_range'])){
            $date = explode(' - ', $dat['date_range']);
            $date[0] = str_replace('/', '-', $date[0]);
            $date[1] = str_replace('/', '-', $date[1]);
            $data['start_date'] = date('Y-m-d', strtotime($date[0]));
            $data['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime($date[1])));
        }

        $filename = "Website Users (".date('d-M-Y__h:i a').").xlsx";
        $excel = Excel::download(new UserExport($data['start_date'], $data['end_date'], $data['email_verified']), $filename);

        return $excel;
    }
}
