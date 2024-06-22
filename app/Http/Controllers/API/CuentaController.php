<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Validator;

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
            $correoExiste = Cuenta::where('correo', $request->correo)->exists();
    
            if ($correoExiste) {
                return response()->json(['error' => 'Este correo ya está registrado'], 400);
            }
    
            $data['nombre'] = $request->nombre;
            $data['correo'] = $request->correo;
            $data['pwd'] = $request->pwd;
            $data['llave'] = $request->llave;
            
            $res = Cuenta::create($data);
            return response()->json($res, 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
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

    // LOGIN
    public function login(Request $request)
    {
        try {
            // Validación de los datos recibidos
            $validator = Validator::make($request->all(), [
                'correo' => 'required|email',
                'pwd' => 'required'
            ]);

            // Manejo de errores de validación
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->all()], 400);
            }

            // Verificar si el correo está registrado
            $cuenta = Cuenta::where('correo', $request->correo)->first();

            if (!$cuenta) {
                return response()->json(['error' => 'El correo no está registrado'], 404);
            }

            // Verificar si la contraseña coincide (sin hashing)
            if ($request->pwd !== $cuenta->pwd) {
                return response()->json(['error' => 'La contraseña no coincide'], 401);
            }

            // Login exitoso, retornar los datos de la cuenta
            return response()->json($cuenta, 200);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }



}
