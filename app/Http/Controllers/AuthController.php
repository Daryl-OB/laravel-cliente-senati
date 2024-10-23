<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        // Crear cliente Guzzle
        $client = new Client();

        try {
            // Realizar la solicitud a la API
            $response = $client->post('http://localhost:8000/api/login', [
                'form_params' => [
                    'email' => $request->email,
                    'password' => $request->password,
                ],
            ]);

            // Procesar la respuesta
            $data = json_decode($response->getBody(), true);

            // Verificar si el login fue exitoso
            if ($data['status'] === 200) {
                // Guardar los datos del usuario en la sesión
                Session::put('user', [
                    'id' => $data['user']['id'], // Asegúrate de incluir el ID si lo necesitas
                    'name' => $data['user']['name'],
                    'email' => $data['user']['email'],
                ]);
                // Redirigir a la vista deseada
                return redirect()->route('home.index');
            }

            return back()->withErrors(['email' => 'Credenciales incorrectas.']);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Manejar errores de la API
            return back()->withErrors(['email' => 'Ocurrió un error al autenticar.']);
        }
    }

    public function registrarse(Request $request)
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'No se registró al usuario',
                'errors' => $validator->errors(),
            ], 400);
        }

        // Crear cliente Guzzle
        $client = new Client();

        try {
            // Realizar la solicitud a la API
            $response = $client->post('http://localhost:8000/api/users', [
                'form_params' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                ],
            ]);

            // Procesar la respuesta
            $data = json_decode($response->getBody(), true);

            if ($data['status'] === 201) {
                // Redirigir a la vista home
                return redirect()->route('home.index');
            }

            return response()->json([
                'message' => 'Error al registrar el usuario',
            ], 500);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Manejar errores de la API
            return response()->json([
                'message' => 'Ocurrió un error al registrar el usuario.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout()
    {
        // Eliminar los datos del usuario de la sesión
        Session::flush(); // Esto eliminará todos los datos de la sesión

        // Redirigir a la página de inicio de sesión
        return redirect()->route('index'); // Asegúrate de que esta ruta esté definida
    }
}
