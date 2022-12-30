<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participante;

class ConsultarPuntos extends Component
{   
    // Models
    public $documento;

    // Useful vars
    public $puntos;

    public function render()
    {
        return view('livewire.consultar-puntos');
    }

    public function getPuntos(){
        $puntos = Participante::select('puntos')->where('document', $this->documento)->first();
        if ($puntos){
            $this->puntos = $puntos->puntos;
        }else {
            $this->puntos = "No hay registros con éste documento";
        }
    }
}
