<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class UserController extends Controller
{
    public function index(){
        $data['menu'] = 'users';

        return view('admin.users.index')->with($data);
    }

    public function load(){
        $response = [];
        $data = Admin::all();
        
        return view('admin.users.load', ['data' => $data]);
    }

    public function create(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['name']) || empty($data['username']) || empty($data['designation']) || empty($data['password']) || empty($data['confirm_password'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $check = Admin::where('username', $data['username'])->first();
            if(empty($check->id)){
                if($data['password'] == $data['confirm_password']){
                    $id = Admin::create($data);

                    if($request->hasFile('profile_image')){
                        $file = $request->file('profile_image');
                        $ext = $file->getClientOriginalExtension();
                        $newname = $id.date('dmyhis').'.'.$ext;

                        $file->move(public_path().'/storage/users',$newname);

                        $c = Admin::find($id);
                        $c->image = $newname;
                        $c->save();

                    }

                    $response['success'] = 'success';
                    $response['message'] = 'Success! New User Created.';
                }else{
                    $response['success'] = false;
                    $response['errors'] = 'Password does not match.';
                }
            }else{
                $response['success'] = false;
                $response['errors'] = 'Username already exist.';
            }

        echo json_encode($response);
        }
    }

    public function update_user(Request $request){
        $data = $request->all();
        $response = [];

        if (empty($data['name']) || empty($data['designation'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        }else{
            $us = Admin::find(base64_decode($data['user_id']));
            $us->fullname = $data['name'];

            $us->removeRole($us->designation);
            $us->assignRole($data['designation']);
            
            $us->designation = $data['designation'];

            if($request->hasFile('edit_profile_image')){
                $file = $request->file('edit_profile_image');
                $ext = $file->getClientOriginalExtension();
                $newname = $us->id.date('dmyhis').'.'.$ext;

                $file->move(public_path().'/storage/users',$newname);

                $us->image = $newname;

            }
            $us->save();

            $response['success'] = 'success';
            $response['message'] = 'Success! User information updated.';

        echo json_encode($response);
        }
    }

    public function changeStatus($id, $status){
        $id = base64_decode($id);

        $u = Admin::find($id);
        $u->is_active = $status;
        $u->save();

        $response = 'success';

        return $response;
    }

    public function edit($id){
        $id = base64_decode($id);

        $data = Admin::find($id);

        return view('admin.users.edit', ['data' => $data]);
    }


    public function delete($id){
        $id = base64_decode($id);

        Admin::destroy($id);

        $response = 'success';

        return $response;
    }
}
