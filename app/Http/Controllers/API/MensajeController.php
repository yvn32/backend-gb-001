<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    //
    public function get(){
        try {
            $data = Mensaje::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    public function create(Request $request){
        try {
            $data['origen'] = $request['origen'];
            $data['destino'] = $request['destino'];
            $data['mensaje'] = $request['mensaje'];
            $data['llave'] = $request['llave'];
            $res = Mensaje::create($data);
            return response()->json( $res, 201);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    public function getById($id){
        try {
            $data = Mensaje::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    public function update(Request $request, $id){
        try {
            $data['origen'] = $request['origen'];
            $data['destino'] = $request['destino'];
            $data['mensaje'] = $request['mensaje'];
            $data['llave'] = $request['llave'];
            Mensaje::find($id)->update($data);
            $res = Mensaje::find($id);
            return response()->json( $res, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage() ], 500);
        }
    }

    public function delete($id){
        try {
            $res = Mensaje::find($id)->delete();
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
