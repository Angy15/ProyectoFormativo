<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidos extends Model
{
    use softDeletes;
    protected $fillable = [
    'nombre',
    'apellido',
    'telefono',
    'direccion',
    'productos_id',
    'cantidad',
    'productos2_id',
    'cantidad2'

    ];
}
