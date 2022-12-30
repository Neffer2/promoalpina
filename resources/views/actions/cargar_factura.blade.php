@extends('layouts.main')
    @section('title')
        {{ Auth::user()->name }}
    @endsection

    @section('content')
        <br><br><br><br><br>
        @livewire('cargar-factura')
    @endsection