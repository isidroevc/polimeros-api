<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Proveedor extends Model
{
    //

    protected $table = 'proveedor';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nombre',
        'telefonoOficina',
        'correoElectronico',
        'domicilio',
        'razonSocial'
    ];

    
}
