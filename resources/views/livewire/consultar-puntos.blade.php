<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" wire:model="documento" placeholder="Documento" class="form-control">    
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" wire:click="getPuntos">🔍</button>
                </div>
            </div>
        </div>        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Neffer Barragan</h5>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>12345</td>
                                        <td>12</td>
                                        <td><a href="">Factura</a></td>
                                        <td>Neffer</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
