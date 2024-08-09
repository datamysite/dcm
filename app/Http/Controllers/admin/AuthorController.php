<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Blogs;
use Illuminate\Support\Facades\File;


class AuthorController extends Controller
{
    public function index()
    {

        return view('admin.blogs.author.index', ['data' => 'data', 'menu' => 'admin.author']);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['name']) || empty($data['about']) || empty($data['slug']) ) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {
            $authors = Author::where('name', $data['name'])->get();

            if (count($authors) == 0 && empty($data['author_id'])) {
                $id = Author::create($data);

                if ($request->hasFile('author_image')) {
                    $file = $request->file('author_image');
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . date('dmyhis') . '.' . $ext;

                    $file->move(public_path() . '/storage/authors', $newname);

                    $c = Author::find($id);
                    $c->image = $newname;
                    $c->save();
                }

                $response['success'] = 'success';
                $response['message'] = 'Success! New Author successfully Created.';

            } else {
                if (!empty($data['author_id'])) {
                    $au = Author::where('name', $data['name'])->where('id', '!=', base64_decode($data['author_id']))->get();
                    if (count($au) == 0) {
                        $au = Author::find(base64_decode($data['author_id']));
                        $au->name = $data['name'];
                        $au->slug = $data['slug'];
                        $au->about = $data['about'];
                        $au->linkedin_url = $data['linkedin_url'];
                        $au->x_url = $data['x_url'];
                        $au->facebook_url = $data['facebook_url'];

                        if ($request->hasFile('edit_author_image')) {
                            $file = $request->file('edit_author_image');
                            $ext = $file->getClientOriginalExtension();
                            $newname = $au->id . date('dmyhis') . '.' . $ext;
                            $file->move(public_path() . '/storage/authors', $newname);
                            $au->image = $newname;
                        }

                        $au->save();

                        $response['success'] = 'success';
                        $response['message'] = 'Success! Author Details successfully Updated.';
                    } else {
                        $response['success'] = false;
                        $response['errors'] = 'Alert! Author (' . $data["name"] . ') is already available.';
                    }
                } else {
                    $response['success'] = false;
                    $response['errors'] = 'Alert! Author (' . $data["name"] . ') is already available.';
                }
            }
        }

        echo json_encode($response);
    }

    public function load()
    {

        $data['author'] = Author::orderBy('id', 'desc')->get();
        return view('admin.blogs.author.load', ['data' => $data]);
        
    }

    public function edit($id)
    {
        $id = base64_decode($id);

        $data = Author::find($id);

        return view('admin.blogs.author.edit', ['data' => $data]);
    }

    public function delete($id)
    {

        $id = base64_decode($id);
     
        $author = Author::find($id);
        $blogs = Blogs::where('author_id', $id)->get();

        if ($blogs->isNotEmpty()) {
            foreach ($blogs as $blog) {
                $blog->status = 0;
                if ($blog->save()) {
                    $response = 'success';
                } else {
                    $response = 'error';
                    break; 
                }
            }
        } else {
            $response = 'error';
        }

        if ($author) {
            $imagePath = public_path('storage/authors/' . $author->image);
    
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
    
            Author::destroy($id);
            $response = 'success';

        } else {
            $response = 'erorr';
        }


        return $response;
    }
}
