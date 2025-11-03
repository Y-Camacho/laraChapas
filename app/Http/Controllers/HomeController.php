<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BottleCap;

class HomeController extends Controller
{
    
    function index() {
        $bottleCapsList = BottleCap::paginate(12);
        return view('home', compact('bottleCapsList'));
    }
}
