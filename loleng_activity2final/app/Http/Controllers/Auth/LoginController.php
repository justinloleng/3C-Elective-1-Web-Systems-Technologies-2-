<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',  
        ]);
        
        $user = DB::table('users')->where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            Auth::loginUsingId($user->id);
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Invalid Credintials']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success' , 'Logged Out Successfully');
    }
}
