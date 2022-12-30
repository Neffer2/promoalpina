@extends('layouts.main')
    @section('title')
        {{ Auth::user()->name }}
    @endsection

    @section('content') 
        @livewire('consultar-puntos')
    @endsection 