<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validate(Array $values, Array $rules) {
        $errors = [];
        $validacion = Validator::make($values, $rules);
        if ($validacion->fails()) {
            foreach ($validacion->errors()->all() as $error) {
                $errors[] = $error;
            }
        }
        return $errors;
    }


    public function error(Array $errors) {
        return response()->json(array(
            "success" => false,
            "data" => null,
            "errors" => $errors
        ), 500);
    }

    /**
     * Función de exito general.
     *
     * @param String $error
     * @return Response
     */

    public function success($data) {
        return [
            'success' => true,
            'data' => $data,
            'status' => 200
        ];
    }

    public function response($data,$status) {
        return [
            'success' => false,
            'data' => $data,
            'status' => $status
        ];
    }
}
