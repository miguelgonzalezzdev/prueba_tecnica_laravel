<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provincias.create');
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Provincia::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('provincias.index')->with('success', 'Provincia creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provincia $provincia)
    {
        return view('provincias.edit', compact('provincia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provincia $provincia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $provincia->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('provincias.index')->with('success', 'Provincia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provincia $provincia)
    {
        $provincia->delete();

        return redirect()->route('provincias.index')->with('success', 'Provincia eliminada correctamente.');
    }
}
