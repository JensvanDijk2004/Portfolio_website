<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function inlog()
    {
        return view("Auth.inlog");
    }

    public function inlogPost()
    {
        
        $credentials = request()->validate([
            'email' => ["required", "email"],
            'password' => ['required']
        ]);
        session()->flush();
        if(!Auth::attempt($credentials)) {
            return redirect()->route('login');
        }
        
        return redirect('home');
    }

    public function signup() {
        return view('Auth.signup');
    }

    public function signUpPost(){
        $data = request()->validate([
            'name' => ["required"],
            'email' => ["required", "email"],
            'password' => ['required', 'min:8', 'max:64'],
            'password_v' => ['required']
        ]);

        $data['password'] = Hash::make($data['password']);        

        $user = User::create($data);

        if(!Auth::login($user)){
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        
        return redirect('/');
    }
}
