<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Countries;
use App\Models\Retailers;
use App\Models\RetailerBranch;
use Auth;

class BranchFAQController extends Controller
{
    public function index($id)
    {
        $data['branch'] = RetailerBranch::find(base64_decode($id));
        $data['retailer'] = Retailers::find($data['branch']->retailer_id);
        $data['countries'] = Countries::all();
        return view('admin.retailers.branch.faq.index', ['data' => $data, 'menu' => 'retailers']);
    }

    public function load($id)
    {
        $data['faq'] = Faq::where('branch_id', base64_decode($id))->get();
        return view('admin.retailers.branch.faq.load', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['country_id']) || empty($data['content']) || empty($data['retailer_id']) || empty($data['branch_id'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $faq = Faq::where('heading', $data['heading'])->where('country_id', $data['country_id'])->where('branch_id', $data['branch_id'])->where('lang', $data['lang'])->get();

            if (count($faq) == 0) {

                $id = Faq::create($data);

                $response['success'] = 'success';
                $response['message'] = 'Success! New FAQ Successfully Added.';
            } else {
                $response['errors'] = 'errors';
                $response['errors'] = 'Errors! FAQ Already Exist!';
            }
        }

        echo json_encode($response);
    }
}
