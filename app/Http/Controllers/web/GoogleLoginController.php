<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Helpers\Mailer;
use App\Models\RewardType;
use App\Models\TransactionHistory;
use Auth;
use Illuminate\Support\Facades\Session;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle($lang): RedirectResponse
    {
        if ((function_exists('session_status') 
          && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
          session_start();
        }
        $_SESSION['lang'] = $lang;

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        $user = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            $existingUser->google_id = $user->id;
            $existingUser->save();

            Session::put('welcomeMessageShown', true);

            auth()->login($existingUser, true);
        } else {
            // Create a new user.
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->email_verified = '1';
            $newUser->password = bcrypt(request(Str::random()));
            $newUser->by_referral = empty($_SESSION['referral']) ? '' : $_SESSION['referral'];
            $newUser->save();

            if(!empty($_SESSION['referral'])){
                $u = User::where('email', base64_decode($_SESSION['referral']))->first();
                if(!empty($u->id)){
                    $r = RewardType::where('type', 'Referral')->first();
                    $u->wallet = $u->wallet+$r->reward;
                    $u->save();

                    $t = new TransactionHistory;
                    $t->user_id = $u->id;
                    $t->coins = $r->reward;
                    $t->type = 'referral';
                    $t->trans_type = 'credit';
                    $t->save();
                }
            }

            Session::put('welcomeMessageShown', true);
            // Log in the new user.
            auth()->login($newUser, true);

            Mailer::sendMail('Welcome to DCM!', $newUser->email, $newUser->name, 'web.emailers.welcome_user', ['name' => $newUser->name, 'email' => $newUser->email]);
            //Mailer::sendMail('Reffer your friends and earn more!', $user->email, $user->name, 'web.emailers.referral_email', ['name' => $user->name, 'email' => $user->email]);
        }

        if ((function_exists('session_status') 
          && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
          session_start();
        }
        $lang = empty($_SESSION['lang']) ? 'en' : $_SESSION['lang'];
         // Redirect to url as requested by user, if empty use /dashboard page as generated by Jetstream
        return redirect()->intended('/'.$lang);
    }
}
