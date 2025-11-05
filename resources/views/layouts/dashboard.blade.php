@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="sidebar w-1/5 lg:w-1/5 h-svh bg-white fixed top-0 left-0 z-0 px-7 py-18">
        @yield('side-content')
    </div>    

    @yield('dash-content')

@endsection