<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    
    public function store(Request $request)

    {

        
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
                ]);

        
        $user_data = array(
            
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        
        //$user = Auth::user();
        //dd($user);              I have done dump test but it is returning null
        
        if(Auth::attempt($user_data))
        {
            return redirect()->route('admin');
        }

        else
        {
            return back()->with('error','wrong Login Details');
        }



        
    } 

}
