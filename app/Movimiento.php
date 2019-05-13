<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    //
    protected $fillable = [
        'id',
        'idProducto',
        'cantidad',
        'tipo',
        'fechaHora'
    ];

    protected $table = 'movimiento';
}
