<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use Jenssegers\Agent\Facades\Agent;

class NewsletterController extends Controller
{
    public function subscribe(Request $request){
        $data = $request->all();
        $response = [];
        $status = 200;
        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        $nl = Newsletter::where('email', $data['email'])->first();
        //$mail = Mailer::sendMail('New Inquiry Received!', 'admin@dealsandcouponsmena.com', 'DCM', 'web.emailers.insiders.inquiry', $data);

        if(empty($nl->id)){

            $n = new Newsletter;
            $n->email = $data['email'];
            $n->save();

            $response['success'] = 'success';
            $response['message'] = 'Success! You successfully subscribe our newsletter.';
        }else{
            $response['success'] = 'error';
            $response['message'] = 'You already subscribed.';
        }



        return response()->json($response, 200);
    }

    public function subscribe_amp(Request $request){
        $data = $request->all();
        $response = [];
        $status = 200;
        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        $nl = Newsletter::where('email', $data['email'])->first();
        //$mail = Mailer::sendMail('New Inquiry Received!', 'admin@dealsandcouponsmena.com', 'DCM', 'web.emailers.insiders.inquiry', $data);

        if(empty($nl->id)){

            $n = new Newsletter;
            $n->email = $data['email'];
            $n->save();

            $status = 200;
            $response['success'] = 'success';
            $response['message'] = 'Success! You successfully subscribe our newsletter.';
        }else{
            $status = 49;
            $response['success'] = 'error';
            $response['message'] = 'You already subscribed.';
        }



        return response()->json($response, $status);
    }
}
