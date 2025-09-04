<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;

class ProvinciasController extends Controller
{
    // Listar todas las provincias
    public function index()
    {
        $provincias = Provincia::all();
        return view('provincias.provincias', compact('provincias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Provincia::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('provincias')->with('success', 'Provincia agregada correctamente.');
    }
}
