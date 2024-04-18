<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    function create(){
      
        return view('auth.register');
    }


    function store(Request $request )  {
        // validate 
        $attributes = $request->validate([
            'name'  => 'required|min:4' , 
            'email' => 'required|email',
            'password' => ['required','confirmed',Password::min(8)->max(32)] , 
        ]);
        // create user 
        $user = User::create($attributes);
        // login for user 
        Auth::login($user);
        // redirect 
        return redirect('/jobs');
    }



    //
    function login(){
      
        return view('auth.login');
    }



    function postLogin(Request $request )  {
        //---- valid 
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => ['required'] , 
        ]);
        //---- attempt 
        if(!Auth::attempt($attributes)){
             throw ValidationException::withMessages([
                'email' => 'sorry this creditional does not match '
             ]);
        }
        //---- token 
        request()->session()->regenerate();
        //--- redirect 
        return redirect('/jobs');
    }

    function logout()  {
        Auth::logout();
        return redirect('/');
    }
}
