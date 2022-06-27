<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

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
    public function profile() {
        return view('admin.profile');
    }

    public function profile_update(Request $request) {
        if ($request->Old_Password != null && $request->name != null && $request->name != Auth::user()->name) {
            if(Hash::check($request->Old_Password, Auth::user()->password)) {
                User::find(Auth::id())->update([
                    'name' => $request->name,
                    'updated_at' => carbon::now(),
                ]);
                return back()->with('update_profile', 'Successfully Updated Your Profile');
            }
            else {
                return back()->with("old_pass_not_match", "Don't match with your old password.");
            }


        }
        elseif ($request->Old_Password != null && $request->password != null) {
            if(Hash::check($request->Old_Password, Auth::user()->password)) {
                    $request->validate([
                    'password' => ['required','min:8','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                   'confirmed'],
                    ]);
                    User::find(Auth::id())->update([
                        'password' => bcrypt($request->password),
                        'updated_at' => carbon::now(),
                    ]);
                return back()->with('update_profile', 'Successfully Updated Your Profile');
            }
            else {
                return back()->with("old_pass_not_match", "Don't match with your old password.");
            }


        }
        elseif ($request->Old_Password != null && $request->photo != null && $request->photo != Auth::user()->photo) {
            if(Hash::check($request->Old_Password, Auth::user()->password)) {
                if (Auth::user()->photo != 'default.png') {
                    $path = public_path() . "/uploads/users/" . Auth::user()->photo;
                    if(is_file($path)){
                        unlink($path);
                        $photo = $request->photo;
                        $extension = $photo->getClientoriginalExtension();
                        $new_profile_name = Auth::id() . '.' . $extension;
                        image::make($photo)->save(base_path('public/uploads/users/' . $new_profile_name));
                        User::find(Auth::id())->update([
                            'photo' => $new_profile_name,
                            'updated_at' => carbon::now(),
                        ]);
                        return back()->with('update_profile', 'Successfully Updated Your Profile');
                    }
                }
                else {
                    $photo = $request->photo;
                    $extension = $photo->getClientoriginalExtension();
                    $new_profile_name = Auth::id() . '.' . $extension;
                    image::make($photo)->save(base_path('public/uploads/users/' . $new_profile_name));
                    User::find(Auth::id())->update([
                        'photo' => $new_profile_name,
                        'updated_at' => carbon::now(),
                    ]);
                    return back()->with('update_profile', 'Successfully Updated Your Profile');

                }

            }
            else {
                return back()->with("old_pass_not_match", "Don't match with your old password.");
            }


        }
        elseif($request->Old_Password != null && $request->name != null && $request->name != Auth::user()->name && $request->password != null && $request->photo != null) {
            if (Auth::user()->photo != 'default.png') {
                $path = public_path() . "/uploads/users/" . Auth::user()->photo;
                if(is_file($path)){
                    unlink($path);
                    $photo = $request->photo;
                    $extension = $photo->getClientoriginalExtension();
                    $new_profile_name = Auth::id() . '.' . $extension;
                    image::make($photo)->save(base_path('public/uploads/users/' . $new_profile_name));
                    User::find(Auth::id())->update([
                        'name' => $request->name,
                        'password' => bcrypt($request->password),
                        'photo' => $new_profile_name,
                        'updated_at' => carbon::now(),
                    ]);
                    return back()->with('update_profile', 'Successfully Updated Your Profile');
                }
            }
            else {
                $photo = $request->photo;
                $extension = $photo->getClientoriginalExtension();
                $new_profile_name = Auth::id() . '.' . $extension;
                image::make($photo)->save(base_path('public/uploads/users/' . $new_profile_name));
                User::find(Auth::id())->update([
                    'name' => $request->name,
                    'password' => bcrypt($request->password),
                    'photo' => $new_profile_name,
                    'updated_at' => carbon::now(),
                ]);
                return back()->with('update_profile', 'Successfully Updated Your Profile');

            }

        }
        else {
            return back()->with('pass_up_error', 'To update any information must be put your current password in the old password field.');
        }


    }
}
