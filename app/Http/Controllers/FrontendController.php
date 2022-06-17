<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\customerregister;
use Illuminate\Validation\Rules\Password;

class FrontendController extends Controller
{

    public function index() {
        return view('index');
    }
    public function CustomerAccount() {
        return view('frontend.account');
    }
    public function signin() {
        return view('frontend.signin');
    }
    public function Customerupdate(CustomerRequest $request) {
        if ($request->password != null && $request->name != null && $request->name != Auth('customerauth')->user()->name) {
            echo 'OMG';
        }

        elseif($request->password == null) {
            if(Hash::check($request->old_password, Auth('customerauth')->user()->password)) {
                customerregister::find(Auth('customerauth')->id())->update([
                    'name' => $request->name,

                ]);
                return back()->with('cus_name_update', 'Name Successfully Updated');
            }

            else {
                return back()->with("not_match_ol_pass", "Don't Match your old password");

            }
        }
        elseif ($request->password != null) {
            if (Hash::check($request->old_password, Auth('customerauth')->user()->password)) {
                customerregister::find(Auth('customerauth')->id())->update([
                    'password' => bcrypt($request->password),


                ]);
                return back()->with('cus_pass_update', 'Password Successfully Updated');
            } else {
                return back()->with("not_match_ol_pass", "Don't Match your old password");
            }
        }


        }




    }




