<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participante;
use App\Models\Producto;
use App\Models\Registro_producto;
use App\Models\Registro_factura;
use App\Models\City;
use Illuminate\Validation\Rules;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CargarFactura extends Component
{
    use WithFileUploads;

    // Models
    public $valor;
    public $documento;
    public $cod_factura;
    public $producto;
    public $puntos = 0;
    public $foto;
    

    // Useful vars
    public $productos = [];
    public $newProductos = [];

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

    // Validations
    public function updatedDocumento (){
        $this->validate(['documento' => ['required', 'numeric']]);

        if (!$this->participanteExist()){
            return redirect()->back()->with('documentError', 'Éste participante no existe');
        }
    }

    public function participanteExist (){
        $check_documento = Participante::select('id')->where('document', $this->documento)->first();
        if (is_null($check_documento)){
            return false;
        }
        return true;
    }

    public function updatedCodFactura() {
        $this->validate(['cod_factura' => ['required', 'unique:registros_factura']]);
    }

    // Actions
    public function puntosCounter (){
        $puntos = 0;
        foreach ($this->newProductos as $item){
            $puntos += round($item['valor']/1000);
        }
        $this->puntos = $puntos;
    }    

    public function registrarProducto (){
        $this->validate([
            'cod_factura' => ['required', 'unique:registros_factura'],
            'documento' => ['required', 'numeric'],
            'valor' => ['required', 'numeric', 'min:500'],
            'producto' => ['required', 'numeric']
        ]);
        if (!$this->participanteExist()){
            return redirect()->back()->with('documentError', 'Éste participante no existe');
        }

        $participante = Participante::select('id')->where('document', $this->documento)->first();
        array_push($this->newProductos, [
            'factura_id' => $this->cod_factura,
            'participante_id' => $participante->id,
            'producto_id' => $this->producto,
            'producto_description' => $this->productos->find($this->producto)->description,
            'valor' => $this->valor
        ]);
        
        $this->valor = 0;
        $this->puntosCounter();
    }
    
    public function deleteProducto ($producto_id){
        $key = $this->searchForId($producto_id, $this->newProductos);
        if (isset($key)){
            array_splice($this->newProductos, $key, 1);
        }
        $this->puntosCounter();
    }

    public function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['producto_id'] === $id) {
                return $key;
            }
        }
        return null;
    }

    public function subirFactura() {
        $this->validate([
            'cod_factura' => ['required', 'unique:registros_factura'],
            'documento' => ['required', 'numeric'],
            'producto' => ['required', 'numeric'],
            'puntos' => ['required', 'numeric', 'min:1'],
            'foto' => ['required', 'mimes:jpeg,jpg,png,gif|max:1000']
        ]);

        $participante = Participante::select('id', 'puntos')->where('document', $this->documento)->first();

        $registro_factura = new Registro_factura;
        $registro_factura->cod_factura = $this->cod_factura;
        $registro_factura->participante_id = $participante->id;
        $registro_factura->puntos_sumados = $this->puntos;
        $registro_factura->foto_factura = $this->foto->store('public/facturas');
        $registro_factura->user_id = Auth::user()->id;
        $registro_factura->save();

        $participante->puntos += $this->puntos;
        $participante->update();

        foreach ($this->newProductos as $newProducto) {
            $registro_producto = new Registro_producto;
            $factura = Registro_factura::select('id')->where('cod_factura', $newProducto['factura_id'])->first();

            $registro_producto->factura_id = $factura->id;
            $registro_producto->participante_id = $newProducto['participante_id'];
            $registro_producto->producto_id = $newProducto['producto_id'];
            $registro_producto->valor = $newProducto['valor'];
            $registro_producto->save();
        }
        
        $this->resetModels();
        return redirect()->back()->with('success', 'Factura cargada exitosamente'); 
    }

    public function resetModels(){
        $this->reset('valor');
        $this->reset('documento');
        $this->reset('cod_factura');
        $this->reset('producto');
        $this->reset('puntos');
        $this->reset('foto');
        $this->reset('newProductos');
    }
}