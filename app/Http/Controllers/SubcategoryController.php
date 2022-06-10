<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    function subcategory() {
        return view('admin.subcategories');
    }
}
