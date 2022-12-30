<div class="container">
    <div class="form-group">
        <label for="">Documento</label>
        <input type="text" wire:model="documento" placeholder="Documento">
        <button wire:click="getPuntos">Consultar</button>
    </div>

    <div>
        {{ $puntos }}
    </div> 
</div>
