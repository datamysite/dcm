<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::gaurd('admin')->check()){
            return redirect(route('dashboard'));
        }else{
            return view('admin.login');
        }
    }

    public function authenticate(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['email']) || empty($data['password'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'is_active' => '1'])){

                $response['success'] = true;
                $response['message'] = 'Success!';
            }else{
                $response['success'] = false;
                $response['errors'] = 'Error! Incorrect email or password.';
            }
        }

        echo json_encode($response);
    }

    public function logout(){
        Auth::logout();

        return redirect(route('login'))->with('success', 'Successfully logged out.');
    }
}
