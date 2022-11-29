<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidos extends Model
{
    use softDeletes;
    protected $fillable = [
    'user_id',
    'nombre',
    'apellido',
    'tipoIdentificacion',
    'numIdentificacion',
    'telefono',
    'direccion',
    'productos_id',
    'cantidad',
    'productos2_id',
    'cantidad2',
    'precioUni1',
    'precioUni2',
    'precioTotal',
    'estado'

    ];
}