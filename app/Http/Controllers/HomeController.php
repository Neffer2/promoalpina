<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show_dash (){
        return view('dashboard');  
    }

    public function registrar (){
        return view('actions.registrar');
    }

    public function cargar_factura (){
        return view('actions.cargar_factura');
    }

    public function consultar_puntos (){
        return view('actions.consultar_puntos');
    }

    public function registrar_action (Request $request){
        dd($request);
    }
}
