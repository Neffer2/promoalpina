<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" wire:model="documento" placeholder="Documento" class="form-control">    
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" wire:click="getData">🔍</button>
                </div>
            </div>
        </div>        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Puntos: {{ $puntos }}</p>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr> 
                                        <th>#</th>
                                        <th>C&oacute;digo de factura</th>
                                        <th>Puntos sumados</th>
                                        <th>Foto de factura</th>
                                        <th>Usuario que registra</th>
                                        <th>M&aacute;s detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($facturas as $key => $factura)
                                        <tr>
                                            <td>{{ $key+=1 }}</td>
                                            <td>{{ $factura->cod_factura }}</td>
                                            <td>{{ $factura->puntos_sumados }}</td>
                                            @php
                                                $factura->foto_factura = str_replace('public/', 'storage/', $factura->foto_factura);
                                            @endphp
                                            <td><a href="{{ $factura->foto_factura }}" target="_blank">Factura</a></td>
                                            <td>{{ $factura->user_admin->name }}</td>
                                            <td>
                                                <a class="btn" data-bs-toggle="collapse" href="#collapseExample{{ $factura->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    🔻
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <div class="collapse" id="collapseExample{{ $factura->id }}">
                                                    <div class="card card-body">
                                                        @livewire('get-productos', ['factura_id' => "$factura->id"])
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if (!empty($facturas))
                        {{ $facturas->links() }}                                    
                    @endif
                </div>
            </div>
        </div> 
    </div>
</div>
