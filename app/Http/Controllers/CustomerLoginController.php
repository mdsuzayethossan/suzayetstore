<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    function post_signin(Request $request) {
        if(Auth::guard('customerauth')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }
        else {
            return redirect()->route('signin');
        }
    }

    public function customer_signout() {
        Auth::guard('customerauth')->logout();
        return redirect()->route('signin');
      }
}
