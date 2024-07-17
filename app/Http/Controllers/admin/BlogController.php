<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Countries;
use App\Models\Faq;
use Auth;

class BlogController extends Controller
{
    public function index()
    {
        $data['menu'] = 'blogs';

        $data['data'] = Blogs::orderBy('id', 'desc')->paginate(10);
        return view('admin.blogs.index')->with($data);
    }

    public function load()
    {
        $p = 1;
        if (!empty($_GET['page'])) {
            $p = $_GET['page'];
        }
        $data = Blogs::orderBy('id', 'desc')->paginate(10, ['*'], 'page', $p);

        return view('admin.blogs.load', ['data' => $data]);
    }

    public function search($val)
    {
        $response = [];
        $data = Blogs::when($val !== '--empty--', function ($q) use ($val) {
            return $q->where('heading', 'like', '%' . $val . '%');
        })->get();

        return view('admin.blogs.load', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['slug']) || empty($data['description']) || empty($data['short_description'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $id = Blogs::create($data);

            if ($request->hasFile('coupon_image')) {
                $file = $request->file('coupon_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id . date('dmyhis') . '.' . $ext;

                $file->move(public_path() . '/storage/blogs', $newname);

                $b = Blogs::find($id);
                $b->banner = $newname;
                $b->save();
            }

            $response['success'] = 'success';
            $response['message'] = 'Success! New Blog Added.';
        }

        echo json_encode($response);
    }

    public function update_blog(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['slug']) || empty($data['description']) || empty($data['short_description'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $id = Blogs::blog_update(base64_decode($data['blog_id']), $data);

            if ($request->hasFile('edit_mblog_image')) {
                $file = $request->file('edit_mblog_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $id . date('dmyhis') . '.' . $ext;

                $file->move(public_path() . '/storage/blogs', $newname);

                $b = Blogs::find($id);
                $b->banner = $newname;
                $b->save();
            }

            $response['success'] = 'success';
            $response['message'] = 'Success! Blog Successfully Updated.';
        }

        echo json_encode($response);
    }


    public function FAQ($blog_id)
    {


        $id = base64_decode($blog_id);
        $data['blog_id'] = $id;
        $data['countries'] = Countries::all();
        $data['faq'] = Blogs::where('id', $id)->first();

        return view('admin.blogs.faq.index', ['data' => $data, 'menu' => 'FAQ']);
    }


    public function createFAQ(Request $request)
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
                $response['message'] = 'Success! New FAQ For Blog Added.';
            } else {
                $response['errors'] = 'errors';
                $response['errors'] = 'Errors! FAQ Already Exist!';
            }
        }

        echo json_encode($response);
    }

    public function loadFAQ($id)
    {

        $data['faq'] = Faq::where('blog_id', base64_decode($id))->with('country')->get();

        return view('admin.blogs.faq.load', ['data' => $data]);
    }


    public function editFAQ($id)
    {
        $id = base64_decode($id);

        $data['countries'] = Countries::all();
        $data['data'] = Faq::find($id);

        return view('admin.blogs.faq.edit', ['data' => $data]);
    }


    public function updateFAQ(Request $request){

        $data = $request->all();
        $response = [];

        if (empty($data['heading']) || empty($data['country_id']) || empty($data['content'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else { 

            $id = Faq::updateFAQ(base64_decode($data['faq_id']), $data);

            $response['success'] = 'success';
            $response['message'] = 'Success! Blog FAQ Successfully Updated.';

        }

        echo json_encode($response);

    }

    public function deleteFAQ($id){

        $id = base64_decode($id);

        Faq::destroy($id);

        $response = 'success';

        return $response;
    }


    public function edit($id)
    {
        $id = base64_decode($id);

        $data = Blogs::find($id);

        return view('admin.blogs.edit', ['data' => $data]);
    }



    public function delete($id)
    {
        $id = base64_decode($id);

        Blogs::destroy($id);

        $response = 'success';

        return $response;
    }
}
