<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogingController extends Controller
{
    
    function index() {
        return view('auth.login-page');
    }

    function logout() {
        auth()->logOut();

        return redirect('/');
    }
}
