<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function loginRequest(Request $request)
    {   
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            // dd($request->all());
            return redirect('/home'); 
        } else {
            // dd($request->all());
            return redirect('/') -> with(['warning' => 'Email atau Password yang anda masukan salah']);
        }
    }
}
