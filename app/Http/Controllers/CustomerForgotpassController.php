<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerResetRequest;
use App\Models\customerregister;
use App\Models\custompassreset;
use App\Notifications\PassResetNotification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Notification;

class CustomerForgotpassController extends Controller
{
    function PasswordForgot() {
        return view('frontend.customforgotpass');
    }

    function CustomerForgotEmaiil(Request $request) {
        $customer = customerregister::where('email', $request->email)->firstOrFail();
        $delete_reset_info = custompassreset::where('customer_id', $customer->id)->delete();
        $reset_info = custompassreset::create([
            'customer_id' => $customer->id,
            'reset_token' => uniqid(),
            'created_at' => Carbon::now(),
        ]);
        Notification::send($customer, new PassResetNotification($reset_info));
        return back()->with('sent_rest_email', 'We have emailed your password reset link! ');


    }
    function CustomerResetForm($reset_token) {
        return view('frontend.customerresetform', compact('reset_token'));
    }
    function CustomerResetUpdate(CustomerResetRequest $request)
    {
        $find_reset_token = custompassreset::where('reset_token', $request->reset_token)->firstOrFail();
        $find_customer = customerregister::where('id', $find_reset_token->customer_id)->firstOrFail();
        $find_customer_email = customerregister::where('id', $find_reset_token->customer_id)->first()->email;


        $find_customer->update([
            'password' => bcrypt($request->password),
        ]);
        if (Auth::guard('customerauth')->attempt(['email' => $find_customer_email, 'password' => $request->password])) {
            custompassreset::where('reset_token', $request->reset_token)->delete();
            return redirect('/');
        }

    }

}
