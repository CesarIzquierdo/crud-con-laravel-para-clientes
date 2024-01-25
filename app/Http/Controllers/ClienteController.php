<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $clientes=Cliente::where('nombre','LIKE','%'.$buscarpor.'%')->get(  );
        return view('cliente.index', compact('clientes', 'buscarpor'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clientes = new Cliente;
        $clientes-> nombre = $request->input('nombre');
        $clientes-> telefono= $request->input('telefono');
        $clientes-> correo = $request->input('correo');
        
        $request-> validate(['file'=>'required|image']);
                
         // Almacenar la imagen en la carpeta 'public/images'
        $imagePath = $request->file('file')->store('public/images');
        // Construir la URL completa de la imagen
        $relativeImagePath = 'storage/images/' . basename($imagePath);

        // Guardar la URL en la base de datos
        $clientes->imagen = $relativeImagePath;
        $clientes->save();
        return redirect() ->back();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clientes = cliente::find($id);
        $clientes-> nombre = $request->input('nombre');
        $clientes-> telefono= $request->input('telefono');
        $clientes-> correo = $request->input('correo');

         // Verificar si se proporcionó una nueva imagen
        if ($request->hasFile('file')) {
            // Validar y almacenar la nueva imagen
            $request->validate(['file' => 'required|image']);                        
                            
            // Almacenar la imagen en la carpeta 'public/images'
            $imagePath = $request->file('file')->store('public/images');
            // Construir la URL completa de la imagen
            $relativeImagePath = 'storage/images/' . basename($imagePath);

            // Guardar la URL en la base de datos
            $clientes->imagen = $relativeImagePath;

        }

        // Guardar los cambios en la base de datos
        $clientes->update();      
        return redirect() ->back();        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $clientes=cliente::find($id);
        $clientes->delete();
        return redirect() ->back();

    }
}
