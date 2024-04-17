<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function create(){
      
        return view('auth.register');
    }
    //
    function login(){
      
        return view('auth.login');
    }


    function store(Request $request )  {
        dd($request->all());
    }


    function postLogin(Request $request )  {
        dd($request->all());
    }
}
