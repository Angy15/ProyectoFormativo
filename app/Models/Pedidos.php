<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{

    protected $fillable = [
        'tipo',
        'cantidad',
        'nombreCliente',
        'direcciónCliente',
        'contactoCliente',
        ''        
    ];
}
