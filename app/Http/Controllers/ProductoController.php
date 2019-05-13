<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Movimiento;
use Carbon\Carbon;
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
        unset($data['id']);
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
        $data_ = $request->all();
        unset($data_['id']);
        $data->update($data_);
        return $data;
    }

    public function mostrar(Request $request) {
        $data = Producto::with('proveedor')->find($request->route('id'));
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        return $data;
    }

    public function listar(Request $request) {
        $data = Producto::with('proveedor');
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        if($request->parametro) {
            $data = $data->where('nombre', 'like', "%$request->parametro%");
        }
        
        return $data->get();
    }

    public function eliminar(Request $request) {
        $data = Producto::find($request->id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        $data->delete();
        return $data;
    }

    public function registrarMovimiento(Request $reques) {
        $data = $request->all();
        $reglas = [
            'idProducto' => 'required',
            'cantidad' => 'required',
            'tipo' => 'required'
        ];

        unset($data['id']);
        $data['fechaHora'] = Carbon::now();
        $errors = $this->validate($data, $reglas);
        if(count($errors) > 0) {
            return $this->error($errors);
        }
        return Movimiento::create($data);
    }

    public function listarMovimientos(Request $request) {
        $data = Producto::where('idProducto', $request->idProducto)
        ->where('tipo', $request->tipo)
        ->get();
        return $data;
    }
}
