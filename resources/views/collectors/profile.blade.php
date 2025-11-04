@extends('layouts.app')

@section('title')
    LaraChapas - Collector
@endsection

@section('content')

    <article class="bg-white p-4 mb-6 rounded-md shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">
            Colección de: <span class="text-orange-800">{{ $collector->user->name }}</span>
        </h2>
        <p class="text-sm text-gray-600">{{ $collector->user->email }}</p>
    </article>


    <x-figure-list :figureList="$caps"/>

@endsection