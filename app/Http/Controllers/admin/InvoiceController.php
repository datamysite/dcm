<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CashbackRequests;
use App\Models\ContestScan;

class InvoiceController extends Controller
{
    public function index()
    {
        $data['menu'] = 'invoices';

        $data['qr_counter'] = count(ContestScan::get());

        return view('admin.invoices.index', ['data' => $data, 'menu' => 'invoices']);
    }

    public function load()
    {
        $data['menu'] = 'invoices';

        $data['data'] = User::where('is_contested', 1)->withCount('cashbackRequests')->get();

        $data['qr_counter'] = count(ContestScan::get());

        return view('admin.invoices.load')->with($data);
    }

    public function filter(Request $request)
    {
        $req = $request->all();
        $get_date = $req['get_date'];

        $date = \Carbon\Carbon::parse($get_date);
        $new_date = $date->format('Y-m-d');

        if ($get_date != '') {

            $data['data'] = User::where('created_at', 'LIKE', $new_date . "%")->get();

            $qr_counter = ContestScan::where('created_at', 'LIKE', $new_date . "%")->get();
            
            $data['qr_counter'] =  count($qr_counter);

           //dd(  $data['qr_counter'] );

            if ($data['data'] != '') {
                return view('admin.invoices.load')->with($data);
            }
           
        }
    }

    public function details($id)
    {

        $id = base64_decode($id);
        $data['user'] = User::where('id', $id)->first();

        $invoices = CashbackRequests::where('user_id', $id)->where('del', 0)->get();

        $data['invoices'] = CashbackRequests::where('user_id', $id)->where('del', 0)->get();

        $count  = count($invoices);
        $data['count'] = $count;

        return view('admin.invoices.details', ['data' => $data, 'menu' => 'invoices']);
    }


    public function viewInvoices($id)
    {
        $id = base64_decode($id);
        $data['user'] = User::where('id', $id)->first();

        $invoices = CashbackRequests::where('user_id', $id)->where('del', 0)->get();

        $data['invoices'] = CashbackRequests::where('user_id', $id)->where('del', 0)->get();

        $count  = count($invoices);
        $data['count'] = $count;

        return view('admin.invoices.view', ['data' => $data, 'menu' => 'invoices']);
    }

    public function UpdateStatus($id, $status)
    {
        $id = base64_decode($id);

        $notifications = CashbackRequests::where('id', $id)->get();

        if (count($notifications) != 0) {

            $noti = CashbackRequests::find($id);
            $noti->status = $status;

            if ($noti->save()) {
                return back();
            }
        }
    }

    public function delSingleInvoice($id)
    {

        //$path = './public/storage/invoices/';
        $//path = '../landingPage/public/storage/invoices/';

        $id = base64_decode($id);
        $cash_back = CashbackRequests::where('id', $id)->get();

        if (count($cash_back) != 0) {

            $cb = CashbackRequests::find($id);

            CashbackRequests::destroy($id);
            
        } else {
            $response['errors'] = 'Cannot delete this file !';
        }
        return redirect()->back();
    }

    public function delAllInvoice($id)
    {

        $user_id = base64_decode($id);

        $cash_back = CashbackRequests::where('user_id', $user_id)->get();

        if (count($cash_back) != 0) {
            foreach ($cash_back as $cb) {
                $file_path = public_path('storage/invoices/') . $cb->invoice_file;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                $cb->delete();
            }
        }

        $response = 'success';
        return $response;
    }
}
