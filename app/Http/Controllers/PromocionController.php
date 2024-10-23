<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PromocionController extends Controller
{
    public function index()
    {
        // Consumir el endpoint
        $response = Http::get('http://127.0.0.1:8000/api/v1/promociones');

        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            $data = $response->json(); // Convertir la respuesta a un arreglo

            // Pasar la información de las categorías a la vista
            return view('promocion.index', ['promociones' => $data['promociones']]);
        }

        // Manejar el caso en que la respuesta no sea exitosa
        return view('promocion.index', ['promociones' => []]);
    }

    public function create()
    {
        return view('promocion.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Consumir el endpoint de la API
        $response = Http::post('http://127.0.0.1:8000/api/v1/promociones', [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            return redirect()->route('promocion.index')->with('success', 'Promocion registrada con éxito.');
        }

        // Manejar el caso en que la respuesta no sea exitosa
        return redirect()->back()->with('error', 'Error al registrar la promocion.')->withInput();
    }


    public function edit($id)
    {
        // Consumir el endpoint de la API para obtener la categoría
        $response = Http::get("http://127.0.0.1:8000/api/v1/promociones/show/{$id}");

        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            $data = $response->json();

            // Pasar la información de la categoría a la vista
            return view('promocion.edit', ['promocion' => $data['promocion']]);
        }

        // Manejar el caso en que la respuesta no sea exitosa
        return redirect()->route('promocion.index')->with('error', 'Error al obtener la promocion.');
    }


    public function update(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Consumir el endpoint de la API para actualizar la categoría
        $response = Http::put('http://127.0.0.1:8000/api/v1/promociones', [
            'id' => $request->id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            return redirect()->route('promocion.index')->with('success', 'Promocion actualizada con éxito.');
        }

        // Manejar el caso en que la respuesta no sea exitosa
        return redirect()->back()->with('error', 'Error al actualizar la promocion.')->withInput();
    }


    public function destroy($id){
        // Consumir el endpoint de la API para eliminar la categoría
        $response = Http::delete('http://127.0.0.1:8000/api/v1/promociones/'.$id);

        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            return redirect()->route('promocion.index')->with('success', 'Promocion eliminada con éxito.');
        }
    }


}
