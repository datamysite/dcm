<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Countries;
use Auth;

class FaqController extends Controller
{

    public function index()
    {
        $data['countries'] = Countries::all();
        return view('admin.cms.faq.index', ['data' => $data, 'menu' => 'admin.faq']);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['country_id']) || empty($data['content'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $faq = Faq::where('heading', $data['heading'])->where('country_id', $data['country_id'])->get();

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

    public function update(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['country_id']) || empty($data['content'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else { 

            $id = Faq::updateFAQ(base64_decode($data['faq_id']), $data);

            $response['success'] = 'success';
            $response['message'] = 'Success! FAQ Successfully Updated.';

        }

        echo json_encode($response);
    }

    public function load()
    {
        $data['faq'] = Faq::where('blog_id', 0)->get();
        return view('admin.cms.faq.load', ['data' => $data]);
    }

    public function edit($id)
    {
        $id = base64_decode($id);

        $data['faq'] = faq::find($id);
        $data['countries'] = Countries::all();

        return view('admin.cms.faq.edit', ['data' => $data]);
    }

    public function delete($id)
    {
        $id = base64_decode($id);

        Faq::destroy($id);

        $response = 'success';

        return $response;
    }
}
