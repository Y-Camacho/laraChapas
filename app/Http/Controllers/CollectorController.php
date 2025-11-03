<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BottleCap;

class CollectorController extends Controller
{
    function index($id) {

        $caps = BottleCap::where("collector_id", $id)->get();
        

        return view('collectors.profile', compact('caps'));
    }
}
