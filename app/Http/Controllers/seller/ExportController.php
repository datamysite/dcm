<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\seller\DataExport;

class ExportController extends Controller
{
    
    public function index(Request $request){
        $data = $request->all();
        $date = explode(' - ', $data['date_range']);
        $filename = "Daily Analyics (".str_replace("/","-",$date[0])." to ".str_replace("/","-",$date[1]).").xlsx";
        $date[0] = date('Y-m-d', strtotime(str_replace("/","-",$date[0])));
        $date[1] = date('Y-m-d', strtotime(str_replace("/","-",$date[1])));
        $excel = Excel::download(new DataExport($date[0], $date[1]), $filename);
        return $excel;
    }
}
