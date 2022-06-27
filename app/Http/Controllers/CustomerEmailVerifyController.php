<?php

namespace App\Http\Controllers;

use App\Models\CustomerEmailVerify;
use App\Models\customerregister;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerEmailVerifyController extends Controller
{
    function VerifiedEmail($verified_token) {
        if(CustomerEmailVerify::where('verify_token', $verified_token)->exists()) {
            $check_verify_token = CustomerEmailVerify::where('verify_token', $verified_token)->firstOrFail();
            $customer = customerregister::findOrFail($check_verify_token->customer_id);
            $customer->update([
                'email_verified_at' => Carbon::now(),
            ]);
            $customer_name = $customer->name;
            session([
                'customer_name' => $customer_name,
            ]);
            CustomerEmailVerify::where('id', $check_verify_token->id)->delete();
            return redirect()->route('verified.welcome')->with('verified_welcome', 'Your email address has been successfully confirmed. Please sign in.');

        }
        else {
            return redirect()->route('signin');
        }


    }
    function verified_welcome() {
        return view('frontend.verified_welcome');
    }
}
