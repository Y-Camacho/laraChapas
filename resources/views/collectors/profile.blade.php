@extends('layouts.app')

@section('title')
    LaraChapas - Collector
@endsection

@section('content')

    <x-figure-list :figureList="$caps"/>

@endsection