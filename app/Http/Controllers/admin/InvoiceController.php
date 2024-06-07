<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CashbackRequests;
use App\Models\ContestScan;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function toss(Request $request)
    {
        $users = User::where('email_verified', 1)
            ->where('is_contested', 1)
            ->whereHas('cashbackRequests', function ($query) {$query->havingRaw('COUNT(invoice_file) >= 4')->where('status', 2);})->withCount('cashbackRequests')->get();

        if (count($users) > 0) {

            $winner = $users->random();
            $usernames = $users->pluck('name')->toArray();

            return response()->json([
                'winner' => $winner->name,
                'usernames' => $usernames,
                'user_id' => $winner->id,
            ]);
        } else {
            return response()->json([
                'winner' => 'no_winner',
                'usernames' => 'no_winner',
            ]);
        }
    }

    public function index()
    {
        $data['menu'] = 'invoices';

        $data['get_referral']  = User::select('id', 'by_referral')->where('by_referral' ,'!=' ,'')
        ->distinct('by_referral')->groupBy('by_referral')->orderBy('id','desc')->get();
        
        return view('admin.invoices.index', ['data' => $data, 'menu' => 'invoices']);
    }

    public function load()
    {
        $data['menu'] = 'invoices';

        $data['data'] = User::where('is_contested', 1)->withCount('cashbackRequests')->orderBy('id', 'desc')->get();

        return view('admin.invoices.load')->with($data);
    }


    public function scanned_qr()
    {
        $data['menu'] = 'scanned_qr';

        $p = 1;
        if (!empty($_GET['page'])) {
            $p = $_GET['page'];
        }

        $data['qr_data'] = ContestScan::select('id', 'name', 'ip', 'city', 'region', 'country', 'created_at', DB::RAW('COUNT(id) as `total_scan`'))
            ->orderBy('id', 'desc')
            ->groupBy('ip')
            ->paginate(10, ['*'], 'page', $p);

        return view('admin.invoices.qr', ['data' => $data, 'menu' => 'scanned_qr']);
    }

    public function load_qr()
    {
        $data['menu'] = 'scanned_qr';

        $p = 1;
        if (!empty($_GET['page'])) {
            $p = $_GET['page'];
        }

        $data['qr_data'] = ContestScan::select('id', 'name', 'ip', 'city', 'region', 'country', 'created_at', DB::RAW('COUNT(id) as `total_scan`'))
            ->orderBy('id', 'desc')
            ->groupBy('ip')
            ->paginate(10, ['*'], 'page', $p);

        $data['qr_counter'] = count(ContestScan::get());

        return view('admin.invoices.qr_load', ['data' => $data]);
    }

    public function qr_filter(Request $request)
    {
        $data = $request->all();

        if (!empty($data['get_date'])) {
            $date = explode(' - ', $data['get_date']);
            $date[0] = str_replace('/', '-', $date[0]);
            $date[1] = str_replace('/', '-', $date[1]);
            $data['start_date'] = date('Y-m-d', strtotime($date[0]));
            $data['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime($date[1])));
        }

        $data['qr_data'] = ContestScan::select('id', 'name', 'ip', 'city', 'region', 'country', 'created_at', DB::RAW('COUNT(id) as `total_scan`'))
            ->whereBetween('created_at', [$data['start_date'], $data['end_date']])->orderBy('id', 'desc')->groupBy('ip')->get();

        $data['qr_counter']  = count(ContestScan::whereBetween('created_at', [$data['start_date'], $data['end_date']])->get());

        if ($data['qr_data'] != '') {
            return view('admin.invoices.qr_load', ['data' => $data]);
        }
    }

    public function filter(Request $request)
    {
        $data = $request->all();

        if (!empty($data['get_date'])) {
            $date = explode(' - ', $data['get_date']);
            $date[0] = str_replace('/', '-', $date[0]);
            $date[1] = str_replace('/', '-', $date[1]);
            $data['start_date'] = date('Y-m-d', strtotime($date[0]));
            $data['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime($date[1])));

            $data['data'] = User::whereBetween('created_at', [$data['start_date'], $data['end_date']])->get();
        }

        if(!empty($data['by_referral'])){
            $by_referral = $data['by_referral'];
            $data['data'] = User::where('by_referral', 'LIKE' , '%'.$by_referral.'%')->get();
        }

        if ($data['data'] != '') {
            return view('admin.invoices.load')->with($data);
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

    public function delete_qr($id)
    {

        $id = base64_decode($id);

        ContestScan::destroy($id);

        $response = 'success';
        return $response;
    }

    public function delSingleInvoice($id)
    {

        //$path = './public/storage/invoices/';

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
