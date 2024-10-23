<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index(){
        // Consumir el endpoint
        $response = Http::get('http://127.0.0.1:8000/api/v1/clientes');

        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            $data = $response->json(); // Convertir la respuesta a un arreglo

            // Pasar la información de las categorías a la vista
            return view('cliente.index', ['clientes' => $data['clientes']]);
        }

        // Manejar el caso en que la respuesta no sea exitosa
        return view('cliente.index', ['cliente' => []]);
    }

    public function create(){
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'dni' => 'required|string',
            'nombre' => 'required|string',
            'ap_paterno' => 'required|string',
            'ap_materno' => 'required|string',
            'telefono' => 'required|string',
            'direccion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Consumir el endpoint de la API
        $response = Http::post('http://127.0.0.1:8000/api/v1/clientes', [
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_paterno,
            'ap_materno' => $request->ap_materno,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            return redirect()->route('cliente.index')->with('success', 'Cliente registrado con éxito.');
        }

        // Manejar el caso en que la respuesta no sea exitosa
        return redirect()->back()->with('error', 'Error al registrar al cliente.')->withInput();
    }

    public function edit($id)
    {
        // Consumir el endpoint de la API para obtener la categoría
        $response = Http::get("http://127.0.0.1:8000/api/v1/clientes/show/{$id}");

        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            $data = $response->json();

            // Pasar la información de la categoría a la vista
            return view('cliente.edit', ['cliente' => $data['cliente']]);
        }

        // Manejar el caso en que la respuesta no sea exitosa
        return redirect()->route('cliente.index')->with('error', 'Error al obtener.');
    }
}
