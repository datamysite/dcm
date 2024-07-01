<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CashbackRequests;
use App\Models\Retailers;
use App\Helpers\Mailer;
use App\Models\BankAccounts;
use Auth;
use Hash;

class UserController extends Controller
{


    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8'
        ]);

        $user = User::create($data);

        Auth::login($user);

        Mailer::sendMail('Email Verification on DCM!', $user->email, $user->name, 'web.emailers.email_otp', ['name' => $user->name, 'email' => $user->email, 'otp' => strval($user->email_otp)]);
        Mailer::sendMail('Welcome to DCM!', $user->email, $user->name, 'web.emailers.welcome_user', ['name' => $user->name, 'email' => $user->email]);
        //Mailer::sendMail('Reffer your friends and earn more!', $user->email, $user->name, 'web.emailers.referral_email', ['name' => $user->name, 'email' => $user->email]);

        $response['success'] = 'success';
        $response['message'] = 'Success! You are successfully logged in.';

        return response()->json($response, 200);
    }

    public function create_from_ext(Request $request)
    {
        $data = $request->all();
        $response = [];

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8'
        ]);

        $user = User::create($data);

        if ($user) {

            Auth::login($user);

            Mailer::sendMail('Email Verification on DCM!', $user->email, $user->name, 'web.emailers.email_otp', ['name' => $user->name, 'email' => $user->email, 'otp' => strval($user->email_otp)]);
            Mailer::sendMail('Welcome to DCM!', $user->email, $user->name, 'web.emailers.welcome_user', ['name' => $user->name, 'email' => $user->email]);
            //Mailer::sendMail('Reffer your friends and earn more!', $user->email, $user->name, 'web.emailers.referral_email', ['name' => $user->name, 'email' => $user->email]);

            return redirect('/en/user/profile');
        } else {
            return redirect('/en/dubai/welcome')->with('register_faulier', 'register_faulier');
        }
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $response = [];
        $error_code = 200;
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'is_active' => '1'])) {

            $error_code = 200;
            $response['success'] = 'success';
            $response['message'] = 'Success! You are successfully logged in.';
        } else {

            $error_code = 49;
            $response['success'] = 'error';
            $response['message'] = 'Incorrect email or password.';
        }


        return response()->json($response, $error_code);
    }

    public function login_from_ext(Request $request)
    {
        $data = $request->all();
        $response = [];
        $error_code = 200;
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'is_active' => '1'])) {

            return redirect('/en/user/profile');
        } else {

            return redirect('/en/dubai/welcome')->with('login_faulier', 'login_faulier');
        }

        return response()->json($response, $error_code);
    }
    public function forgotPassword(Request $request)
    {
        $data = $request->all();
        $response = [];

        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        $u = User::where('email', $data['email'])->first();

        if (!empty($u->id)) {


            Mailer::sendMail('Reset Your Password!', $u->email, $u->name, 'web.emailers.reset_password', ['id' => $u->id, 'name' => $u->name, 'email' => $u->email]);


            $response['success'] = 'success';
            $response['message'] = 'Success! Reset Password link is sent to your email.';
        } else {

            $response['success'] = 'error';
            $response['message'] = 'Invalid email address.';
        }


        echo json_encode($response);
    }

    public function resetPassword($lang, $id, $email)
    {
        $data['id'] = base64_decode($id);
        $data['email'] = base64_decode($email);
        $u = User::where('id', $data['id'])->where('email', $data['email'])->first();
        if (empty($u->id)) {
            return redirect('/');
        }
        return view('web.user.password-reset')->with($data);
    }

    public function updatePassword(Request $request)
    {
        $data = $request->all();
        $response = [];

        $this->validate($request, [
            'password' => 'required|confirmed|min:8',
        ]);

        $u = User::find(base64_decode($data['unique_id']));

        $u->password = bcrypt($data['password']);
        $u->save();

        $response['success'] = 'success';
        $response['message'] = 'Success! Your password successfully updated.';

        echo json_encode($response);
    }


    public function logout($lang)
    {

        Auth::logout();

        return redirect('/' . $lang);
    }



    //Profile
    public function profile()
    {

        return view('web.user.user-profile');
    }

    public function verify_email($lang, Request $request)
    {
        $data = $request->all();
        $response = [];

        $validated = $request->validate([
            'email_otp' => 'required'
        ]);

        if (Auth::user()->email_otp == $data['email_otp']) {
            $u = User::find(Auth::id());
            $u->email_verified = '1';
            $u->save();

            $response['success'] = 'success';
            $response['message'] = 'Success! Email successfully Verified.';
        } else {

            $response['success'] = 'error';
            $response['message'] = 'Incorrect OTP! Please try again.';
        }


        echo json_encode($response);
    }

    public function claimCashback()
    {
        $data['requests'] = CashbackRequests::where('user_id', Auth::id())->where('is_contested', 0)->with('retailerName')->orderBy('id', 'desc')->get();
        $data['brands'] = Retailers::where('type', '1')
            ->where('status', 1)
            ->join('retailer_countries', 'retailer_countries.retailer_id', '=', 'retailers.id')
            ->where('retailer_countries.country_id', 1)->orderBy('retailers.id', 'ASC')
            ->get();

        //$data['invoices'] = CashbackRequests::where('user_id',  Auth::id())->where('is_contested', 0)->with('retailerName')->get();

        return view('web.user.user-claim-cashback', ['data' => $data]);
    }

    public function claimCashbackRequest(Request $request)
    {
        $data = $request->all();
        $retailer_id = $data['retailer_id'];
        $response = [];
        $accepts = array('png', 'pdf', 'jpg', 'jpeg');


        if ($request->hasFile('user_invoice')) {
            $file = $request->file('user_invoice');
            $ext = $file->getClientOriginalExtension();

            if (in_array($ext, $accepts)) {
                $newname = Auth::id() . date('dmyhis') . '.' . $ext;

                $file->move(public_path() . '/storage/users/invoices', $newname);

                $c = new CashbackRequests;
                $c->date = date('Y-m-d');
                $c->user_id = Auth::id();
                $c->invoice_file = $newname;
                $c->retailer_id = $retailer_id ;
                $c->is_contested = 0;
                $c->save();


                $response['success'] = 'success';
                $response['message'] = 'Success! Your invoice successfully uploaded.';
            } else {
                $response['success'] = 'error';
                $response['message'] = 'only these format are acceptable: PDF, PNG, JPG';
            }
        } else {
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


    public function dashboard()
    {

        return view('web.user.user-dashboard');
    }

    public function settings()
    {

        return view('web.user.user-settings');
    }

    public function settings_update(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (!empty($data['current_password']) || !empty($data['password']) || !empty($data['password_confirmation'])) {
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
            } else {
                $response['success'] = 'error';
                $response['message'] = array('current_password' => 'Current password is Incorrect.');
            }
        } else {

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

    public function bank_details(Request $request)
    {

        $data = $request->all();
        $response = [];
        $user_id =  Auth::user()->id;

        if (!empty($data['bank_id']) || !empty($data['bnk_account_name']) || !empty($data['bnk_iban']) || !empty($data['bnk_account_number'])) {
            $this->validate($request, [
                'bank_id' => 'required',
                'bnk_account_name' => 'required',
                'bnk_iban' => 'required',
                'bnk_account_number' => 'required',
            ]);

            $bnk = BankAccounts::where('user_id', $user_id)->get();

            if (count($bnk) == 0) {

                $bank_account = BankAccounts::create($data);

                if ($bank_account) {
                    $response['success'] = 'success';
                    $response['message'] = 'Success! Your account bank details successfully inseted.';
                } else {
                    $response['success'] = 'error';
                    $response['message'] = 'error! error while insert data.';
                }
            } else {
                $response['success'] = 'exist';
                $response['message'] = 'exist! account details already exists for this user.';
            }
        }

        echo json_encode($response);
    }
}
