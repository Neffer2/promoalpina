<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\City;

class HomeController extends Controller
{
    public function show_dash (){
        return view('dashboard');  
    }

    public function show_registrar (){
        $ciudades = City::all();
        return view('actions.registrar', ['ciudades' => $ciudades]);
    }

    public function cargar_factura (){
        return view('actions.cargar_factura');
    }

    public function show_consultar_puntos (){
        return view('actions.consultar_puntos');
    }

    public function registrar_action (Request $request){
        $request->validate([
            'name' => ['required'],
            'document' => ['required', 'unique:participantes'],
            'email' => ['required', 'email', 'unique:participantes'],
            'telefono' => ['required', 'unique:participantes'],
            'ciudad' => ['required'],
            'fecha_nacimiento' => ['required']
        ]);
    
      
        $participante = new Participante;
        $participante->name = $request->name;
        $participante->document = $request->document;
        $participante->email = $request->email;
        $participante->telefono = $request->telefono;
        $participante->ciudad = $request->ciudad;
        $participante->fecha_nacimiento = $request->fecha_nacimiento;
        $participante->save();

        return redirect()->back()->with('success', 'Participante creado exitosamente');
    }
}
