@extends('layouts.main')
    @section('title')
        {{ Auth::user()->name }}
    @endsection

    @section('content')
        <div class="container">
            <form action="">
                <div>
                    <label for="">Nombre: </label>
                    <input type="text">
                </div>
                <div>
                    <label for="">Documento: </label>
                    <input type="text">
                </div>
                <div>
                    <label for="">email</label>
                    <input type="text">
                </div>
                <div>
                    <label for="">Telefono</label>
                    <input type="text">
                </div> 
                <div>
                    <label for="">Ciudad</label>
                    <select name="" id="">
                        <option value="">Seleccionar</option>
                    </select>
                </div>
                <div>
                    <label for="">Fecha nacimiento: </label>
                    <input type="text">
                </div>
                <div>
                    <button>Enviar</button>
                </div>
            </form>
        </div>
    @endsection 