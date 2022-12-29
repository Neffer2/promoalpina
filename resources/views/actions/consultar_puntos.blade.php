@extends('layouts.main')
    @section('title')
        {{ Auth::user()->name }}
    @endsection

    @section('content')
        <div class="container">
            Consultar puntos
        </div>
    @endsection