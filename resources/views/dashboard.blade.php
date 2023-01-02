@extends('layouts.main')
    @section('title')
        {{ Auth::user()->name }}
    @endsection

    @section('content')
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Registrar</h4>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('registrar') }}">Registrar participante</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cargar factura</h4>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('cargar_factura') }}">Cargar Factura</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Consultar puntos</h4>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('consultar_puntos') }}">Consultar puntos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection