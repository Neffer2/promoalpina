<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participante;
use App\Models\Registro_factura;
use App\Models\Registro_producto;
use Livewire\WithPagination;
 
class ConsultarPuntos extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // Models
    public $documento;

    // Useful vars
    public $puntos;
    public $name = ''; 
    public $participante;
    public $productos = [];

    //Las variables public no pueden ser paginations
    public function render()
    {   
        /* Pregunto si la variable existe y es diferente de null }
        * -- Explicacion completa en la funcion getFacturas() --
        */
        if (isset($this->participante)){
            $facturas = Registro_factura::select('id', 'cod_factura', 'participante_id', 'puntos_sumados', 'foto_factura', 'user_id', 'created_at')
                                                ->where('participante_id', $this->participante->id)
                                                ->orderBy('created_at', 'desc')
                                                ->paginate(8);

            return view('livewire.consultar-puntos', ['facturas' => $facturas]);
        }
        return view('livewire.consultar-puntos', ['facturas' => []]);
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
    
    /*Define la variable publica $this->participante con la coleccion del participante que llega por parametro.
    * ¿Por qué? Porque Livewire no permite enviar un pagination con una variable púbica.
    */

    public function getFacturas($participante){
        $this->participante = $participante;
    }
}
