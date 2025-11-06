<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\UserRol;
use App\Models\User;

class AdminController extends Controller
{
    function index(){

        $userAdmin = User::where('rol', UserRol::Admin->value)->first();
        $userList = User::with('collector')->where('id', '!=', $userAdmin->id)->get();

        return view('admin.dashboard', compact('userList', 'userAdmin'));
    }
}
