<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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

        return view('web.user.user-claim-cashback');
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
}
