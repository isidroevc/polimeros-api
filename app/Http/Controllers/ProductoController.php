<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class ProductoController extends Controller
{
    //
    public function crear(Request $request) {
        $data = $request->all();
        $reglas = [
            'idProveedor' => 'required|exists:proveedor,id',
            'nombre' => 'required',
            'cantidadExistencia'=> 'required',
            'unidadMedida' => 'required',
            'puntoReorden' => 'required',
        ];

        $errors = $this->validate($data, $reglas);
        if(count($errors) > 0) {
            return $this->error($errors);
        }
        return Producto::create($data);
    }


    public function editar(Request $request) {
        $data = Producto::find($request->id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        $errors = $this->validate($data, $reglas);
        $data->update($request->all());
        return $data;
    }
}
