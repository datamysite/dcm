<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retailers;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\RetailerBranch;
use URL;

class RetailerBranchController extends Controller
{
    
    public function index($id)
    {
        $data['menu'] = 'retailers';
        $data['retailer'] = Retailers::find(base64_decode($id));

        return view('admin.retailers.branch.index')->with($data);
    }

    public function load($id)
    {
        $response = [];
        $data = RetailerBranch::where('retailer_id', base64_decode($id))->get();

        return view('admin.retailers.branch.load', ['data' => $data]);
    }

    public function search_retailer($val)
    {
        $html = '';

        $data = Retailers::where('name', 'like', '%' . $val . '%')->limit(7)->get();
        foreach ($data as $key => $value) {
            $html .= '<a href="' . route('admin.retailer.branch', base64_encode($value->id)) . '">
                          <p>
                            <img src="' . URL::to("/public/storage/retailers/" . $value->logo) . '">&nbsp;&nbsp;&nbsp;&nbsp;|
                            &nbsp;&nbsp;&nbsp;&nbsp;<span>' . $value->name . '</span>
                          </p>
                        </a>';
        }

        echo $html;
    }


    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['name'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $retailer_blog = RetailerBranch::where('name', $data['name'])->where('retailer_id', base64_decode($data['retailer_id']))->get();

            if (count($retailer_blog) == 0) {

                $id = RetailerBranch::create($data);

                $response['success'] = 'success';
                $response['message'] = 'Success! New Branch Added.';

            } else {
                $response['success'] = false;
                $response['errors'] = 'Error! Branch Already Exist !';
            }

            echo json_encode($response);
        }
    }

    public function edit($id)
    {
        $id = base64_decode($id);

        $data['data'] = RetailerBranch::find($id);

        return view('admin.retailers.branch.edit')->with($data);
    }


    public function update_branch(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['name'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {
            $rb = RetailerBranch::find(base64_decode($data['branch_id']));
            $rb->name = $data['name'];
            $rb->save();

            $response['success'] = 'success';
            $response['message'] = 'Success! Branch Successfully Updated.';

            echo json_encode($response);
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);

        RetailerBranch::destroy($id);

        $response = 'success';

        return $response;
    }
}
