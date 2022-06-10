<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationbarController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    function navigationbar() {
        return view('admin.navigationbar');
    }
}
