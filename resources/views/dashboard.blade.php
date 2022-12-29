@extends('layouts.main')
    @section('title')
        {{ Auth::user()->name }}
    @endsection

    @section('content')
        <div class="container">
            <ul>
                <li>
                    <a href="{{ route('registrar') }}">Registrar</a>
                </li>
                <li>
                    <a href="{{ route('cargar_factura') }}">Cargar Factura</a>
                </li>
                <li>
                    <a href="{{ route('consultar_puntos') }}">Consultar puntos</a>
                </li>
            </ul>
        </div>
    @endsection