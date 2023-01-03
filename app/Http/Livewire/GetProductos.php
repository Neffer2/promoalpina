<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Registro_producto;

class GetProductos extends Component
{   
    public $productos = [];

    public function render()
    {
        return view('livewire.get-productos');
    }

    public function mount($factura_id){
        $this->productos = Registro_producto::select('producto_id', 'valor')->where('factura_id', $factura_id)->get();
    }
}
