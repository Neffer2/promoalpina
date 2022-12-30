<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Cargar factura</h4>
        </div>
        <div class="card-body"> 
            <div class="row">
                <div class="col md-6">
                    <div class="form-group">
                        <label for=""><b>Documento</b></label> 
                        <input type="text" class="form-control @error('documento')  is-invalid @endif" wire:model="documento" required>
                        @error('documento') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col md-6">
                    <div class="form-group">
                        <label for=""><b>Cod Factura</b></label> 
                        <input type="text" class="form-control" wire:model="cod_factura" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""><b>Productos</b></label>
                                            <select name="" id="" class="form-control" required>
                                                <option value="">Seleccionar</option>
                                                @foreach ($productos as $producto)
                                                    <option value="{{ $producto->id }}"> {{ $producto->description }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""><b>Valor</b></label>
                                            <input type="number" class="form-control" placeholder="$" wire:model="valor" required>                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for=""></label>
                                <button class="btn btn-primary">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <label for=""></label>
                        <input type="text" class="form-control" disabled wire:model="productos">
                    </div>
                </div>
            </div> 
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label for=""><b>Foto factura</b></label> 
                    <input type="file" class="form-control" required>
                </div>
            </div>  
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
            </div>            
        </div>
    </div>
</div>
