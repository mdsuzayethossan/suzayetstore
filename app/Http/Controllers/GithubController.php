<?php

namespace App\Http\Controllers;

use App\Models\customerregister;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GithubController extends Controller
{
    function RedirectToProvider() {
        return Socialite::driver('github')->redirect();
    }
    function CallbackFromGithub() {
        $user = Socialite::driver('github')->user();
        if(customerregister::where('email', $user->getEmail())->exists()){
            if(Auth::guard('customerauth')->attempt(['email'=> $user->getEmail(), 'password'=>'mQAg7sU$$w'])) {
                return redirect('/');
             }

        }
        else {
            customerregister::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt('mQAg7sU$$w'),
                'created_at' => Carbon::now(),
            ]);
            if(Auth::guard('customerauth')->attempt(['email'=> $user->getEmail(), 'password'=>'mQAg7sU$$w'])) {
               return redirect('/');
            }

        }

    }
}
