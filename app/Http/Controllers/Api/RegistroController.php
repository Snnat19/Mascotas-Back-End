<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro; // Cambiado a Registro
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
    public function index()
    {
        $usuarios = Registro::all(); // Cambiado a Registro

        $data = [
            'usuarios' => $usuarios, // Cambiado a usuarios
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:200',
            'email' => 'required|email|unique:usuarios,email', // Cambiado a usuarios
            'documento' => 'required|unique:usuarios,documento', // Cambiado a usuarios
            'telefono' => 'required|digits:10',
            'nom_mascota' => 'nullable|max:200', // Cambiado a nullable
            'especie' => 'nullable|max:100', // Cambiado a nullable
            'raza' => 'nullable|max:100', // Cambiado a nullable
            'color' => 'nullable|max:50', // Cambiado a nullable
            'ubicacion' => 'required|max:255',
            'fecha' => 'required|date',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $usuario = Registro::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'documento' => $request->documento,
            'telefono' => $request->telefono,
            'nom_mascota' => $request->nom_mascota,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'color' => $request->color,
            'ubicacion' => $request->ubicacion,
            'fecha' => $request->fecha,
        ]);

        if (!$usuario) {
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'usuario' => $usuario, // Cambiado a usuario
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($documento)
    {
    $usuario = Registro::where('documento', $documento)->first();

    if (!$usuario){
        $data = [
            'message' => 'Usuario no encontrado',
            'status' => 404
        ];
        return response()->json($data, 404);
    }

    $data = [
        'usuario' => $usuario,
        'status' => 200
    ];
    return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $usuario = Registro::find($id);

        if (!$usuario){
            $data = [
                    'message' => 'Usuario no encontrado',
                    'status' => 404
                ];
                return response()->json($data, 404);  
        }

        $usuario->delete();

        $data = [
            'message' => 'Mascota eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);  
    }

    public function update(Request $request, $id)
    {
        $usuario = Registro:: find($id);

        if (!$usuario) {
        $data = [
            'message' => 'Usuario no encontrado',
            'status' => 404
        ];
        
        return response()->json($data,404);
        }

        $validator = validator::make($request->all(),[
            'nombre' => 'required|max:200',
            'email' => 'required|email|unique:usuarios,email', // Cambiado a usuarios
            'documento' => 'required|unique:usuarios,documento', // Cambiado a usuarios
            'telefono' => 'required|digits:10',
            'nom_mascota' => 'nullable|max:200', // Cambiado a nullable
            'especie' => 'nullable|max:100', // Cambiado a nullable
            'raza' => 'nullable|max:100', // Cambiado a nullable
            'color' => 'nullable|max:50', // Cambiado a nullable
            'ubicacion' => 'required|max:255',
            'fecha' => 'required|date',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

            $usuario->nombre = $request->nombre;
            $usuario-> email = $request->email;
            $usuario -> documento = $request->documento;                                                                                   
            $usuario -> telefono = $request->telefono;
            $usuario -> nom_mascota = $request->nom_mascota;
            $usuario -> especie = $request->especie;
            $usuario -> raza = $request->raza;
            $usuario -> color = $request->color;
            $usuario -> ubicacion = $request->ubicacion;
            $usuario -> fecha = $request->fecha;

            $usuario->save();

            $data = [
                'message' => 'Datos Actualizados',
                'usuario' => $usuario,
                'status' => 200
            ];
            return response()->json($data, 200);

    }
    
}