<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciasController extends Controller
{
    // Mostrar todas las provincias
    public function index()
    {
        $provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));
    }

    // Vista nueva provincia
    public function create()
    {
        return view('provincias.create');
    }

    // Guardar una nueva provincia (desde modal)
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

    // Vista editar provincia
    public function edit(Provincia $provincia)
    {
        return view('provincias.edit', compact('provincia'));
    }

    // Actualizar una provincia
    public function update(Request $request, Provincia $provincia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $provincia->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('provincias')->with('success', 'Provincia actualizada correctamente.');
    }

    // Eliminar una provincia
    public function destroy(Provincia $provincia)
    {
        $provincia->delete();

        return redirect()->route('provincias')->with('success', 'Provincia eliminada correctamente.');
    }
}
