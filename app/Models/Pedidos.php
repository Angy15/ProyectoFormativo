<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{

    protected $fillable = [
        'cantidad',
        'nombreCliente',
        'apellidoCliente',
        'direccionCliente',
        'correoCliente',
        'contactoCliente',
        'producto_id',
       
    ];
}
