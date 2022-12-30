<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participante;
use App\Models\Producto;
use App\Models\City;
use Illuminate\Validation\Rules;

class CargarFactura extends Component
{
    // Models
    public $valor;
    public $documento;
    public $cod_factura;

    // Useful vars
    public $productos = [];

    public function render()
    {
        return view('livewire.cargar-factura');
    }

    public function mount() {
        $this->getCities();
    }

    public function getCities (){
        $this->productos = Producto::all();
    }


    // Validations

    public function updatedDocumento (){
        $this->validate(['documento' => ['required', 'string', 'max:10', 'numeric']]);
    }
}
