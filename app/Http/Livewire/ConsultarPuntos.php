<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participante;
use App\Models\Registro_factura;
use App\Models\Registro_producto;
 
class ConsultarPuntos extends Component
{   
    // Models
    public $documento;

    // Useful vars
    public $puntos;
    public $name = '';
    public $facturas = [];
    public $productos = [];

    public function render()
    { 
        return view('livewire.consultar-puntos');
    }

    public function getData(){
        $participante = Participante::select('id','puntos', 'name')->where('document', $this->documento)->first();
        $this->getPuntos($participante);
        $this->getFacturas($participante);
    }

    public function getPuntos($participante){
        if ($participante){
            $this->puntos = $participante->puntos;
            $this->name = $participante->name;
        }else {
            $this->puntos = "No hay registros con éste documento";
        }
    }

    public function getFacturas($participante){
        if (isset($participante)){
            $this->facturas = Registro_factura::select('id', 'cod_factura', 'participante_id', 'puntos_sumados', 'foto_factura', 'user_id', 'created_at')->where('participante_id', $participante->id)->get();
        }        
    }
}
