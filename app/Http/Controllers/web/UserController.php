<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CashbackRequests;
use Auth;
use Hash;

class UserController extends Controller
{
    

    public function create(Request $request){
        $data = $request->all();
        $response = [];

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8'
        ]);

        $user = User::create($data);

        Auth::login($user);

        $response['success'] = 'success';
        $response['message'] = 'Success! You are successfully logged in.';

        echo json_encode($response);
    }

    public function login(Request $request){
        $data = $request->all();
        $response = [];

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'is_active' => '1'])){

            $response['success'] = 'success';
            $response['message'] = 'Success! You are successfully logged in.';
        }else{

            $response['success'] = 'error';
            $response['message'] = 'Incorrect email or password.';
        }


        echo json_encode($response);
    }


    public function logout(){

        Auth::logout();

        return redirect()->back();
    }



    //Profile
    public function profile()
    {

        return view('web.user.user-profile');
    }

    public function claimCashback()
    {
        $data['requests'] = CashbackRequests::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('web.user.user-claim-cashback')->with($data);
    }

    public function claimCashbackRequest(Request $request)
    {
        $data = $request->all();
        $response = [];
        $accepts = array('png', 'pdf', 'jpg', 'jpeg');


        if ($request->hasFile('user_invoice')) {
            $file = $request->file('user_invoice');
            $ext = $file->getClientOriginalExtension();

            if(in_array($ext, $accepts)){
                $newname = Auth::id() . date('dmyhis') . '.' . $ext;

                $file->move(public_path() . '/storage/users/invoices', $newname);

                $c = new CashbackRequests;
                $c->date = date('Y-m-d');
                $c->user_id = Auth::id();
                $c->invoice_file = $newname;
                $c->save();


                $response['success'] = 'success';
                $response['message'] = 'Success! Your invoice successfully uploaded.';
            }else{
                $response['success'] = 'error';
                $response['message'] = 'only these format are acceptable: PDF, PNG, JPG';
            }
        }else{
            $response['success'] = 'error';
            $response['message'] = 'Please select invoice file first.';
        }

        echo json_encode($response);
    }

    public function paymenyHistory()
    {

        return view('web.user.user-payment-history');
    }

    public function referralEarn()
    {

        return view('web.user.user-referral-earn');
    }

    public function withdrawPayment()
    {

        return view('web.user.user-withdraw-payment');
    }

    public function settings()
    {

        return view('web.user.user-settings');
    }

    public function settings_update(Request $request){
        $data = $request->all();
        $response = [];

        if(!empty($data['current_password']) || !empty($data['password']) || !empty($data['password_confirmation'])){
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'current_password' => 'required|min:8',
                'password' => 'required|confirmed|min:8',
            ]);
            $u = User::find(Auth::id());
            if (Hash::check($data['current_password'], $u->password)) {
                
                $u->name = $data['name'];
                $u->phone = $data['phone'];
                $u->newsletter = empty($data['newsletter']) ? '0' : '1';
                $u->password = bcrypt($data['password']);
                $u->save();

                $response['success'] = 'success';
                $response['message'] = 'Success! Your profile successfully uploaded.';
            }else{
                $response['success'] = 'error';
                $response['message'] = array('current_password' => 'Current password is Incorrect.');
            }

        }else{

            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required'
            ]);

            $u = User::find(Auth::id());
            $u->name = $data['name'];
            $u->phone = $data['phone'];
            $u->newsletter = empty($data['newsletter']) ? '0' : '1';
            $u->save();
            
            $response['success'] = 'success';
            $response['message'] = 'Success! Your profile successfully uploaded.';
        }

        echo json_encode($response);

    }
}
