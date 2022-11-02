<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{

    protected $fillable = [
        'producto_id',
        'cantidad',
        'nombreCliente',
        'apellidoCliente',
        'direccionCliente',
        'correoCliente',
        'contactoCliente', 
    ];
}
