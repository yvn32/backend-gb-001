<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentaController extends Controller
{
    //
    public function get(){
        try {
            $data = Cuenta::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    public function create(Request $request){
        try {
            $data['nombre'] = $request['nombre'];
            $data['correo'] = $request['correo'];
            $data['pwd'] = $request['pwd'];
            $data['llave'] = $request['llave'];
            $res = Cuenta::create($data);
            return response()->json( $res, 201);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    public function getById($id){
        try {
            $data = Cuenta::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    public function update(Request $request, $id){
        try {
            $data['nombre'] = $request['nombre'];
            $data['correo'] = $request['correo'];
            $data['pwd'] = $request['pwd'];
            $data['llave'] = $request['llave'];
            Cuenta::find($id)->update($data);
            $res = Cuenta::find($id);
            return response()->json( $res, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    public function delete($id){
        try {
            $res = Cuenta::find($id)->delete();
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }


}
