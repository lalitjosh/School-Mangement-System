<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        Auth::logout();

        return redirect()->route('admin');
    }
}
