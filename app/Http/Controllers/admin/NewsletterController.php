<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\admin\NewsletterExport;

class NewsletterController extends Controller
{
    public function index(){
        $data['menu'] = 'newsletter';

        return view('admin.newsletter.index')->with($data);
    }

    public function load(){
        $response = [];
        $data = Newsletter::orderBy('id', 'desc')->get();
        
        return view('admin.newsletter.load', ['data' => $data]);
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

        $data['data'] = Newsletter::when(!empty($data['date_range']), function ($q) use ($data) {
                                return $q->whereBetween('created_at',[$data['start_date'], $data['end_date']] );
                            })->get();

        return view('admin.newsletter.load')->with($data);
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

        $filename = "Newsletter Emails (".date('d-M-Y h:i a').").xlsx";
        $excel = Excel::download(new NewsletterExport($data['start_date'], $data['end_date']), $filename);

        return $excel;
    }
}
