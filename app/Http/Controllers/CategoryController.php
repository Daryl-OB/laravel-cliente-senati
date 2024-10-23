<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('categoria.index');
    }

    public function store(Request $request){

        // Crear cliente Guzzle
        $client = new Client();

        try {
            // Realizar la solicitud a la API
            $response = $client->post('http://localhost:8000/api/categories', [
                'form_params' => [
                    'user_id' => $request->user_id, // USUARIO ID
                    'nombre' => $request->nombre,
                ],
            ]);

            // Procesar la respuesta
            $data = json_decode($response->getBody(), true);

            if ($data['status'] === 201) {
                // Redirigir a la vista home
                return redirect()->route('categoria.index');
            }

            return response()->json([
                'message' => 'Error al registrar la tarea',
            ], 500);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Manejar errores de la API
            return response()->json([
                'message' => 'Ocurrió un error al registrar tarea.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
