<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
                            })->when(!empty($data['newsletter']) || $data['newsletter'] == '0', function ($q) use ($data) {
                                return $q->where('newsletter', $data['newsletter']);
                            })->get();

        return view('admin.web_users.load')->with($data);
    }
}
