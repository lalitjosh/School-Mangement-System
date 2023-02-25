<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    
    public function index()
    {
    
   
    return view('register');

    }
   

    public function store(Request $request)
    {
       

        User::create([

             'name'=>$request->name,
             'password'=>$request->username,
             'email'=>$request->email,
             'password'=>Hash::make($request->password)  ,   


        ]);


      Auth::attempt($request->only('email', 'password')); 



      return redirect()->route('admin');

    }

}

