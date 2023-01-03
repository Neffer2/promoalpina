<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_producto extends Model
{
    use HasFactory;
    protected $table = "registros_producto";

    protected $fillabel = [
        'factura_id',
        'participante_id',
        'producto_id',
        'valor'
    ];

    public function product_name()
    {
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }
}