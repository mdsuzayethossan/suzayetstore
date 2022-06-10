<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employees()
    {
        return view('admin.employees');
    }

    public function admin() {
        return view('admin.index');
    }
    public function home()
    {
        $user_id = Auth::id();
        $all_users = user::where('id', '!=', $user_id)->orderBy('id', 'desc')->paginate(3);
        $total_user = user::count();
        $logged_user = Auth::user()->name;
        return view('home', compact('all_users', 'total_user', 'logged_user'));
    }
}
