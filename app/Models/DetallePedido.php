<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $fillable = [
        "tipo",
        "user_id",
        "descripcion",
        "cantidad",
        "precio",
        "precio1",
        "precioTotal",
        "producto_id"


    ];
}
