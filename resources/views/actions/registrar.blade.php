@extends('layouts.main')
    @section('title')
        {{ Auth::user()->name }}
    @endsection 

    @section('content')
        <div class="container">
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h4>Registrar participante</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('registrar') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nombre: </label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Documento: </label>
                            <input type="text" class="form-control" name="document" value="{{ old('document') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="number" class="form-control" name="telefono" value="{{ old('telefono') }}" required>
                        </div> 
                        <div class="form-group">
                            <label for="">Ciudad</label>
                            <select name="ciudad" class="form-control" value="{{ old('ciudad') }}" required>
                                <option value="">Seleccionar</option>
                                @foreach ($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}">{{ $ciudad->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Fecha nacimiento: </label>
                            <input type="date" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                        </div>
                        <div class="form-group">
                            <br>
                            <button class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection 