<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'producto';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'idProveedor',
        'nombre',
        'cantidadExistencia',
        'unidadMedida',
        'puntoReorden',
        'entradas',
        'salidas',
    ];
}
