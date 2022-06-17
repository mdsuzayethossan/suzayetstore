<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardRequest;
use App\Models\customerregister;
use Carbon\Carbon;


class CustomerRegisterController extends Controller
{
    function customer_register(GuardRequest $request) {
        customerregister::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now(),
        ]);
        return back()->with('customer_register_success', 'Registered successfully');


    }
}
