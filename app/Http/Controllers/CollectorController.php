<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BottleCap;
use App\Models\Collector;

class CollectorController extends Controller
{
    function index($id) {

        $caps = BottleCap::where('collector_id', $id)->paginate(12);  
        $collector = Collector::with('user')->find($id);

        return view('collectors.profile', compact('caps', 'collector'));
    }
}
