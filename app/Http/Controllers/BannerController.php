<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    function banner() {
        return view('admin.banner');
    }
}
