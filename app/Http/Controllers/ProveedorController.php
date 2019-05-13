<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
class ProveedorController extends Controller
{
    //
    public function listar(Request $request) {
        $data = Proveedor::all();
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        return $data;
    }
}
