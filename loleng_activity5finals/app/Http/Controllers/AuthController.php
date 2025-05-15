<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
{
        return view('login');
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $user = DB::table('users')->where('email', $credentials['email'])->first();
    if ($user && Hash::check($credentials['password'], $user->password))  
   {
        session(['loggedUser' => $user]);
        return redirect('/dashboard');
    } else {
        return back()->with('error', 'Invalid credentials');
    }
}

public function dashboard()
{
        $user = session('loggedUser');
        return view('dashboard', compact('user'));
}

public function logout()
{
        session()->forget('loggedUser');
        return redirect('/login');
}
public function create()
{
    return view('register');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required', 'confirmed'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Registration successful!');
}

}
