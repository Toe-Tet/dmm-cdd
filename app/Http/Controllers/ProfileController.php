<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\BaseController;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends BaseController
{
    public function profile(){
        $admin = admin();
        return $this->view('admin.profile.profile', compact('admin'));
    }

    public function validation(Request $request, $id){
        $rules = [
            'name' => 'required|string'
        ];

        if($request->new_password){
            $rules['old_password'] = 'required|string|old_password:'.$id;
            $rules['new_password'] = 'required|string';
            $rules['confirm_password'] = 'required|string|same:new_password';
        }
        return $request->validate($rules);
    }

    public function setData(Request $request){
        $data = ['name' => $request->name ];
        if($request->new_password){
            $data['password'] =  bcrypt($request->new_password);
        }
        return $data;
    }

    public function update(Request $request){
        $admin = admin();
        $this->validation($request, $admin->id);
        $data = $this->setData($request);
        User::where('id', $admin->id)->update($data);
        success_alert('Admin is updated');
        return back();
    }


}
