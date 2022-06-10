<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Footercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    function footer() {
        return view('admin.footer');
    }
}
