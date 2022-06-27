<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardRequest;
use App\Models\CustomerEmailVerify;
use App\Models\customerregister;
use App\Notifications\CutomerEmailVerifyNotification;
use Carbon\Carbon;
use Notification;

class CustomerRegisterController extends Controller
{
    function customer_register(GuardRequest $request) {
        customerregister::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now(),
        ]);
        $customer = customerregister::where('email', $request->email)->firstOrFail();
        $existing_verify_token = CustomerEmailVerify::where('customer_id', $customer->id)->delete();

        $insert_verify_token = CustomerEmailVerify::create([
            'customer_id' => $customer->id,
            'verify_token' => uniqid(),
            'created_at' => Carbon::now(),
        ]);
        Notification::send($customer, new CutomerEmailVerifyNotification($insert_verify_token));

        return back()->with('registersuccess', 'We just need to verify your email address before you can sign in.');


        return back()->with('customer_register_success', 'Registered successfully');


    }
}
