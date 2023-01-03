<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_factura extends Model
{ 
    use HasFactory;
    protected $table = "registros_factura";

    protected $fillable = [
        'cod_factura',
        'participante_id',
        'puntos_sumados',
        'foto_factura'
    ];

    public function user_admin()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
