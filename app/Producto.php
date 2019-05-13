<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Producto extends Model
{
    //
    use SoftDeletes;
    
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

    public function proveedor() {
        return $this->belongsTo('App\Proveedor', 'idProveedor');
    }
}
