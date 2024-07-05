<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CashbackRequests;
use App\Models\Retailers;
use App\Helpers\Mailer;
use App\Models\BankAccounts;
use App\Models\TransactionHistory;
use App\Models\WithdrawRequests;
use App\Models\ConversionRate;
use App\Models\Countries;
use App\Models\ClaimType;
use App\Models\RewardType;
use App\Models\StoreVisits;
use Auth;
use Hash;
use Illuminate\Support\Facades\Session;

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


            Session::put('welcomeMessageShown', true);
            //session()->put('welcomeMessageShown', true);

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
        session()->forget('welcomeMessageShown');
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
        $data['requests'] = CashbackRequests::where('user_id', Auth::id())->with('retailerName')->orderBy('id', 'desc')->get();
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
                $c->retailer_id = $retailer_id;
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

        $data['requests'] = WithdrawRequests::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(6);
        $data['rate'] = ConversionRate::where('country_id', config('app.country'))->first();
        $data['country'] = Countries::find(config('app.country'));
        $data['claimType'] = ClaimType::where('type', 'Cash Withdraw')->first();

        return view('web.user.user-withdraw-payment')->with($data);
    }

    public function withdrawPaymentSubmit(Request $request)
    {
        $data = $request->all();
        $response = [];

        $claimType = ClaimType::where('type', 'Cash Withdraw')->first();
        $rate = ConversionRate::where('country_id', config('app.country'))->first();
        $bank_account = BankAccounts::where('user_id', Auth::id())->first();
        $country = Countries::find(config('app.country'));

        if (empty($bank_account->id)) {

            $response['success'] = 'error';
            $response['message'] = 'Alert! Please update your Bank Account before submit withdraw request.';

            return json_encode($response);
        }

        if ($data['coins'] < $claimType->eligibility) {

            $response['success'] = 'error';
            $response['message'] = 'Alert! You cannot submit request until you reach minimun (' . $claimType->eligibility . ' coins).';

            return json_encode($response);
        }


        if ($data['coins'] > Auth::user()->wallet) {

            $response['success'] = 'error';
            $response['message'] = 'Alert! You cannot submit request with more than your available coins.';

            return json_encode($response);
        }

        $w = new withdrawRequests;
        $w->user_id = Auth::id();
        $w->coins = $data['coins'];
        $w->amount = ($data['coins'] / $rate->coins) * $rate->value;
        $w->curr = $country->curr;
        $w->status = '1';
        $w->save();

        $u = User::find(Auth::id());
        $u->wallet = $u->wallet - $data['coins'];
        $u->save();

        $t = new TransactionHistory;
        $t->user_id = Auth::id();
        $t->coins = $data['coins'];
        $t->type = 'withdraw';
        $t->trans_type = 'debit';
        $t->save();



        $response['success'] = 'success';
        $response['message'] = 'Success! Your request successfully submitted.';

        echo json_encode($response);
    }

    public function dashboard()
    {

        $data['requested_cashback'] = CashbackRequests::where('user_id', Auth::id())->where('status', 1)->count('id');

        $data['approved_cashback'] = CashbackRequests::where('user_id', Auth::id())->where('status', 2)->count('id');

        $data['coupon_used'] = CashbackRequests::where('user_id', Auth::id())->count('id');

        $data['store_visits'] = StoreVisits::where('user_id', Auth::id())->count();

        //dd($data);
        return view('web.user.user-dashboard')->with($data);
    }

    public function settings()
    {

        $data['bank_details'] = BankAccounts::where('user_id', Auth::id())->first();

        $data['bank_array'] = [
            ['value' => '1', 'key' => 'First Abu Dhabi Bank', 'arabic_value' => 'بنك أبوظبي الأول' , 'eng_value' => 'First Abu Dhabi Bank'],
            ['value' => '2', 'key' => 'Abu Dhabi Commercial Bank', 'arabic_value' => 'بنك أبوظبي التجاري' , 'eng_value' => 'Abu Dhabi Commercial Bank'],
            ['value' => '3', 'key' => 'Arab Bank For Investment and Foreign Trade', 'arabic_value' => 'البنك العربي للاستثمار والتجارة الخارجية' , 'eng_value' => 'Arab Bank For Investment and Foreign Trade'],
            ['value' => '4', 'key' => 'Commercial Bank of Dubai', 'arabic_value' => 'البنك التجاري لدبي' , 'eng_value' => 'Commercial Bank of Dubai'],
            ['value' => '5', 'key' => 'Emirates NBD', 'arabic_value' => 'إمارات دبي الوطني' , 'eng_value' => 'Emirates NBD'],
            ['value' => '6', 'key' => 'Mashreq', 'arabic_value' => 'بنك المشرق', 'eng_value' => 'Mashreq'],
            ['value' => '7', 'key' => 'Bank of Sharjah', 'arabic_value' => 'بنك الشارقة' , 'eng_value' => 'Bank of Sharjah'],
            ['value' => '8', 'key' => 'United Arab Bank', 'arabic_value' => 'البنك العربي المتحد' , 'eng_value' => 'United Arab Bank'],
            ['value' => '9', 'key' => 'Invest Bank', 'arabic_value' => 'بنك الاستثمار' , 'eng_value' => 'Invest Bank'],
            ['value' => '10', 'key' => 'National Bank of Ras Al-Khaimah PJSC (RAKBANK)', 'arabic_value' => 'بنك رأس الخيمة الوطني' , 'eng_value' => 'National Bank of Ras Al-Khaimah PJSC (RAKBANK)'],
            ['value' => '11', 'key' => 'Dubai Islamic Bank', 'arabic_value' => 'بنك دبي الإسلامي' , 'eng_value' => 'Dubai Islamic Bank'],
            ['value' => '12', 'key' => 'Emirates Islamic Bank', 'arabic_value' => 'بنك الإمارات الإسلامي', 'eng_value' => 'Emirates Islamic Bank'],
            ['value' => '13', 'key' => 'Sharjah Islamic Bank', 'arabic_value' => 'بنك الشارقة الإسلامي', 'eng_value' => 'Sharjah Islamic Bank'],
            ['value' => '14', 'key' => 'Abu Dhabi Islamic Bank', 'arabic_value' => 'بنك أبوظبي الإسلامي', 'eng_value' => 'Abu Dhabi Islamic Bank'],
            ['value' => '15', 'key' => 'Al Hilal Bank', 'arabic_value' => 'بنك الهلال', 'eng_value' => 'Al Hilal Bank'],
            ['value' => '16', 'key' => 'Ajman Bank', 'arabic_value' => 'بنك عجمان', 'eng_value' => 'Ajman Bank'],
            ['value' => '17', 'key' => 'Emirates Investment Bank', 'arabic_value' => 'بنك الإمارات للاستثمار' , 'eng_value' => 'Emirates Investment Bank'],
            ['value' => '18', 'key' => 'BNP Paribas', 'arabic_value' => 'BNP Paribas', 'eng_value' => 'BNP Paribas'],
            ['value' => '19', 'key' => 'Standard Chartered', 'arabic_value' => 'Standard Chartered', 'eng_value' => 'Standard Chartered'],
            ['value' => '20', 'key' => 'HSBC', 'arabic_value' => 'HSBC', 'eng_value' => 'HSBC'],
            ['value' => '21', 'key' => 'Al Maryah Community Bank', 'arabic_value' => 'بنك المارية المحلي', 'eng_value' => 'Al Maryah Community Bank'],
            ['value' => '22', 'key' => 'Al Masraf Arab Bank for Investment & Foreign Trade', 'arabic_value' => 'المصرف العربي للاستثمار والتجارة الخارجية', 'eng_value' => 'Al Masraf Arab Bank for Investment & Foreign Trade'],
            ['value' => '23', 'key' => 'Commercial Bank International', 'arabic_value' => 'البنك التجاري الدولي', 'eng_value' => 'Commercial Bank International'],
            ['value' => '24', 'key' => 'Dubai Bank', 'arabic_value' => 'بنك دبي', 'eng_value' => 'Dubai Bank'],
            ['value' => '25', 'key' => 'Dubai Finance Bank', 'arabic_value' => 'بنك دبي المالي', 'eng_value' => 'Dubai Finance Bank'],
            ['value' => '26', 'key' => 'National Bank of Fujairah', 'arabic_value' => 'بنك الفجيرة الوطني', 'eng_value' => 'National Bank of Fujairah'],
            ['value' => '27', 'key' => 'National Bank of Umm Al-Quwain', 'arabic_value' => 'بنك أم القيوين الوطني', 'eng_value' => 'National Bank of Umm Al-Quwain'],
            ['value' => '28', 'key' => 'Noor Bank', 'arabic_value' => 'بنك نور', 'eng_value' => 'Noor Bank'],
            ['value' => '29', 'key' => 'Wio Bank', 'arabic_value' => 'ويو بنك ش.م.ع. مرخص من قبل مصرف', 'eng_value' => 'Wio Bank'],
        ];
        
        return view('web.user.user-settings', ['data' => $data]);
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
        $msg = '';
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
                    $msg = 'success';
                } else {
                    $msg = 'error';
                }
            } else {

                if ($data['id'] != null) {
                    $ba = BankAccounts::find($data['id']);
                    $ba->bank_id = $data['bank_id'];
                    $ba->user_id = $user_id;
                    $ba->account_holder_name = $data['bnk_account_name'];
                    $ba->iban = $data['bnk_iban'];
                    $ba->account_number = $data['bnk_account_number'];

                    if ($ba->save()) {
                        $msg = 'updated';
                    } else {
                        $msg = 'error';
                    }
                }
            }
        }
        return redirect()->route('user.settings')->with($msg, $msg);
    }

    public function transactionHistory()
    {
        $data['history'] = TransactionHistory::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(10);

        return view('web.user.user-transaction-history')->with($data);
    }
}
