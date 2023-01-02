<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participante;
use App\Models\Producto;
use App\Models\Registro_producto;
use App\Models\City;
use Illuminate\Validation\Rules;

class CargarFactura extends Component
{
    // Models
    public $valor;
    public $documento;
    public $cod_factura;
    public $producto;
    

    // Useful vars
    public $productos = [];
    public $registred_prodcutos = [];

    public function render()
    {
        return view('livewire.cargar-factura');
    }

    public function mount() {
        $this->getProductos();
    }

    public function getProductos (){
        $this->productos = Producto::all();
    }

    // public refreshProductos (){
        
    //     $this->registred_prodcutos = registros_producto::select('id', 'producto_id')->where('factura_id', );
    // }


    // Validations

    public function updatedDocumento (){
        $this->validate(['documento' => ['required', 'numeric']]);
        $check_documento = Participante::select('id')->where('document', $this->documento)->first();
        if ($check_documento == null){
            return redirect()->back()->with('documentError', 'Éste participante no existe');
        }
    }

    public function updatedCodFactura() {
        $this->validate(['cod_factura' => ['required', 'unique:registros_factura']]);
    }

    public function registrarProducto (){
        $this->validate([
            'cod_factura' => ['required', 'unique:registros_factura'],
            'documento' => ['required', 'numeric'],
            'valor' => ['required', 'numeric'],
            'producto' => ['required', 'numeric']
        ]);

        $participante = Participante::select('id')->where('document', $this->documento)->first();

        $registro_producto = new Registro_producto;
        $registro_producto->factura_id = $this->cod_factura;
        $registro_producto->participante_id = $participante->id;
        $registro_producto->producto_id =$this->producto;
        $registro_producto->save();

        return redirect()->back()->with('status', 'Prodcuto registrado exitósamente');
    }
}
