<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\City;
use Illuminate\Support\Facades\Hash;

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
        
        $check_documento = Participante::select('id')->where('document', $this->DataEncrypt($request->document))->first();
        if (!is_null($check_documento)){
            return back()->withErrors(['document' => 'Éste documento yá fué registrado'])->withInput();
        }

        $check_email = Participante::select('id')->where('email', $this->DataEncrypt($request->email))->first();
        if (!is_null($check_email)){
            return back()->withErrors(['email' => 'Éste correo yá fué registrado'])->withInput();
        }

        $check_telefono = Participante::select('id')->where('telefono', $this->DataEncrypt($request->telefono))->first();
        if (!is_null($check_telefono)){
            return back()->withErrors(['telefono' => 'Éste teléfono yá fué registrado'])->withInput();
        }
        
        $participante = new Participante;
        $participante->name = $request->name;
        $participante->document = $this->DataEncrypt($request->document);
        $participante->email = $this->DataEncrypt($request->email);
        $participante->telefono = $this->DataEncrypt($request->telefono);
        $participante->ciudad = $request->ciudad;
        $participante->fecha_nacimiento = $request->fecha_nacimiento;
        $participante->save();

        return redirect()->back()->with('success', 'Participante creado exitosamente');
    }

    public function DataEncrypt ($value){
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "Bull-PromoAlpina.2023";
        $encryption = openssl_encrypt($value, $ciphering, $encryption_key, $options, $encryption_iv);
        return $encryption;
    }
}
