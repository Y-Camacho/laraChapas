<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BottleCap;
use App\Models\Collector;

class CollectorController extends Controller
{
    function index($id) {

        if(!$id) return redirect('home');

        $caps = BottleCap::where('collector_id', $id)->paginate(12);  
        $collector = Collector::with('user')->find($id);

        return view('collectors.profile', compact('caps', 'collector'));
    }

    function showCollection($id) {

        if(!$id) return redirect('home');

        $authId = Collector::where("user_id", auth()->user()->id)->value("id");
        if($id != $authId){
            return redirect()->route('collector.collection', ['id' => $authId]);
        }

        $caps = BottleCap::where('collector_id', $id)->paginate(12);  
        $collector = Collector::with('user')->find($id);

        return view('collectors.collection', compact('caps', 'collector'));
    }
}
