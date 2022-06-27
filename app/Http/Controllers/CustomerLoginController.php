<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerSigninRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\customerregister;

class CustomerLoginController extends Controller
{
    function post_signin(CustomerSigninRequest $request) {
        $request_email = $request->email;
        if(customerregister::where('email', $request->email)->exists()){
           if(customerregister::where('email', $request->email)->where('email_verified_at', '!=', null)->exists()) {
            if(Auth::guard('customerauth')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/');
            }
            else {
                return redirect()->route('signin');
            }
           }
           else {
            return redirect()->route('signin')->with('notverified', 'Please verify your email');
           }
        }
        else {
            return redirect()->route('signin')->with('notregistered','The '. $request_email. ' '.'address is not recognized');
        }

    }

    public function customer_signout() {
        Auth::guard('customerauth')->logout();
        return redirect()->route('signin');
      }
}
