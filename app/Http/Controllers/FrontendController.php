<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
