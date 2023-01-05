<form wire:submit.prevent="subirFactura" class="container"> 
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>Cargar factura</h4>
        </div> 
        <div class="card-body">  
            <div class="row">
                <div class="col md-6">
                    <div class="form-group"> 
                        <label for=""><b>Documento:</b></label> 
                        <input type="text" class="form-control @error('documento') is-invalid @endif" wire:model.lazy="documento" required>
                        @error('documento') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                        @endif 
                        @if (session('documentError'))
                            <div class="text-danger">
                                {{ session('documentError') }}
                            </div>
                        @endif
                    </div>
                </div> 
                <div class="col md-6">
                    <div class="form-group">
                        <label for=""><b>Cod Factura:</b></label> 
                        <input type="text" class="form-control @error('cod_factura') is-invalid @endif" wire:model.lazy="cod_factura" required>
                        @error('cod_factura') 
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @endif 
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
                                            <label for=""><b>Productos:</b></label>
                                            <select class="form-control @error('producto') is-invalid @endif" required wire:model="producto">
                                                <option value="">Seleccionar</option>
                                                @php
                                                    $cadena = $productos[0]['cadena'];
                                                @endphp
                                                @foreach ($productos as $key => $producto)
                                                    @if ($cadena != $producto->cadena || $key == 0)
                                                        @php
                                                            $cadena = $producto->cadena;
                                                        @endphp
                                                        <optgroup label="{{ $cadena }}">
                                                    @endif
                                                        <option value="{{ $producto->id }}"> {{ $producto->description }} - {{ $producto->cadena }}</option>
                                                    @if ($cadena != $producto->cadena)
                                                        @php
                                                            $cadena = $producto->cadena;
                                                        @endphp
                                                        </optgroup>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('producto')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @endif                                            
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""><b>Valor:</b></label>
                                            <input type="number" class="form-control @error('valor') is-invalid @endif" placeholder="$" wire:model="valor" required>                                
                                            @error('valor')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @endif                                            
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for=""><b>Cantidad:</b></label>
                                            <input type="number" class="form-control @error('cantidad') is-invalid @endif" placeholder="$" wire:model="cantidad" required>                                
                                            @error('cantidad')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @endif                                            
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-md-2"> 
                                <label for=""></label>
                                <button type="button" wire:click="registrarProducto" class="btn btn-primary">+</button>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-9">
                        <div class="row"> 
                            @foreach ($newProductos as $producto)
                                <div class="col-md-3 mt-1 mb-1">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-10">
                                                <div class="card-body">                                                
                                                    <b>{{ $producto['producto_description'] }}:</b> $ {{ $producto['valor'] }}
                                                </div>
                                            </div>
                                            <div class="col-md-2 btn btn-danger d-flex align-items-center" wire:click="deleteProducto('{{ $producto['producto_id'] }}')">
                                                X
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> 
            <hr>
            <div class="row"> 
                <div class="col-md-6">
                    <label for=""><b>Foto factura:</b></label> 
                    <input type="file" class="form-control @error('foto') is-invalid @endif" required wire:model="foto" accept="image/*">
                    @error('foto')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @endif   
                </div>
                <div class="col-md-6">
                    <label for=""><b>Puntos: </b></label> 
                    <input type="text" disabled class="form-control @error('puntos') is-invalid @endif" wire:model="puntos" required>
                    @error('puntos')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @endif 
                </div>  
            </div>  
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </div>
            </div>            
        </div>
    </div>
</form>
