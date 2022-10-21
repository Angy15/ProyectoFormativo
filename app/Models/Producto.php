<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use softDeletes;
    protected $fillable = [
        'tipo',
        'descripcion',
<<<<<<< HEAD
        'imagen',
=======
>>>>>>> 318dc06 (dayron)
        'precio',
        'existencia'
    ];
}
