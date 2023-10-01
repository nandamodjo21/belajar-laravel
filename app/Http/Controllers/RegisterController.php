<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
   public function index()
   {
    return view('register.index',[
        'title' => 'Register',
        'active' => 'Register'
    ]);
   }

   public function store(Request $request)
   {
  $validatedData = $request->validate([
    'name' => 'required|max:255',
    'username' => ['required','min:3','max:255','unique:users'],
    'email' => 'required|email:dns|unique:users',
    'password' => 'required|min:5|max:255',
    'email_verified_at' => now(),
    'remember_token' => Str::random(10),
   ]);

//    dd($validatedData);

   User::create($validatedData);
//    $request->session()->flash('success','Registrasi berhasil! Silahkan login');
   return redirect('/login')->with('success','Registrasi berhasil! Silahkan login');
   }
}