<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index()
   {
    return view('login.index',[
        'title' => 'Login',
        'active' => 'login'
        
    ]);
   }

   public function authenticate(Request $request)
   {
        $data = $request->validate([
                'email' => 'required|email:dns',
                'password' => 'required'
            ]);

            if(Auth::attempt($data)){
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
                // dd($data,'berhasil login');
            }

            return back()->with('loginErorr','Login Failed!');
            // return back()->withErrors([
            //     'email' => 'gagal'
            // ])->onlyInput('email');

    dd('berhasil');
   }

   public function logout(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/home');
   }
}