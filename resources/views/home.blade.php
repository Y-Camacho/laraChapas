@extends('layouts.app')

@section('title')
    LaraChapas
@endsection

@section('content')
    <h1 class="text-3xl font-bold pb-10">
      Descubre nuevas colecciones.
    </h1>

    <x-figure-list :figureList="$bottleCapsList"/>

@endsection