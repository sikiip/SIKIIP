<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {

    	if(Auth::attempt($request->only('username','password')))
    	{
            return redirect('beranda');
    	}

        $request->session()->flash('error', 'Username atau Password Tidak Valid!');

    	return redirect('/');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/'); 
    }
}
