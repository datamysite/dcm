<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request){
        $data = $request->all();
        $response = [];

        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        //$mail = Mailer::sendMail('New Inquiry Received!', 'admin@dealsandcouponsmena.com', 'DCM', 'web.emailers.insiders.inquiry', $data);

        if(empty($mail)){
            $response['success'] = 'success';
            $response['message'] = 'Success! You successfully subscribe our newsletter.';
        }else{

            $response['success'] = 'error';
            $response['message'] = 'Something went wrong.';
        }



        echo json_encode($response);
    }
}
