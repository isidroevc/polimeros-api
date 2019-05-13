<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['cors'])->options('{any?}', function ($any = null) {
    return response("", 200);
})->where('any', '.*');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group([ 'prefix' => 'Producto', 'middleware' => ['cors']], function() {
    Route::post('agregarProducto', 'ProductoController@crear');
    Route::post('modificarProducto/{id}', 'ProductoController@editar');
    Route::get('listarProductos', 'ProductoController@listar');
    Route::get('mostrarProducto/{id}', 'ProductoController@mostrar');
    Route::post('eliminarProducto/{id}', 'ProductoController@eliminar');
    Route::get('listarMovimientos', 'ProductoController@listarMovimientos');
    Route::post('registrarMovimiento', 'ProductoController@registrarMovimiento');
});

Route::group([ 'prefix' => 'Proveedor', 'middleware' => ['cors']], function() {
    Route::get('listarProveedores', 'ProveedorController@listar');
});
