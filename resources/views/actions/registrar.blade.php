@extends('layouts.main')
    @section('title')
        {{ Auth::user()->name }}
    @endsection 

    @section('content')
        <div class="container">
            <form action="{{ route('registrar') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nombre: </label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label for="">Documento: </label>
                    <input type="text" name="document" required>
                </div>
                <div class="form-group">
                    <label for="">email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="number" name="telefono" required>
                </div> 
                <div class="form-group">
                    <label for="">Ciudad</label>
                    <select name="ciudad" id="" required>
                        <option value="">Seleccionar</option>
                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->id }}">{{ $ciudad->description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Fecha nacimiento: </label>
                    <input type="date" name="fecha_nacimiento">
                </div>
                <div class="form-group">
                    <button>Enviar</button>
                </div>
            </form>
        </div>
    @endsection 