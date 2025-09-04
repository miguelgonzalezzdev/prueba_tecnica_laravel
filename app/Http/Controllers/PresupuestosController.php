<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\EstadosPresupuesto;
use App\Models\Presupuesto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PresupuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presupuestos = Presupuesto::all();
        return view('presupuestos.index', compact('presupuestos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimoPresupuesto = Presupuesto::orderBy('id', 'desc')->first();

        if ($ultimoPresupuesto) {
            // Extraer el número del código y sumarle 1
            $ultimoNumero = (int) substr($ultimoPresupuesto->codigo, 1);
            $nuevoNumero = $ultimoNumero + 1;
        } else {
            $nuevoNumero = 1;
        }

        // Formatear con ceros a la izquierda y añadir prefijo 'P'
        $nuevoCodigo = 'P' . str_pad($nuevoNumero, 4, '0', STR_PAD_LEFT);

        $clientes = Cliente::orderBy('nombre', 'asc')->orderBy('apellidos', 'asc')->get();

        $estados = EstadosPresupuesto::all();

        return view('presupuestos.create', compact('nuevoCodigo', 'clientes', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => [
                'required',
                'string',
                Rule::unique('presupuestos', 'codigo')
                    ->whereNull('deleted_at'), // Ignora los registros soft deleted
            ],
            'fecha' => 'required|date',
            'titulo' => 'required|string|max:255',
            'estado' => 'nullable|exists:estados_presupuestos,id',
            'total' => 'nullable|numeric|min:0',
            'cliente' => 'nullable|exists:clientes,id',
        ]);

        Presupuesto::create([
            'codigo' => $request->codigo,
            'fecha' => $request->fecha,
            'titulo' => $request->titulo,
            'estado' => $request->estado,
            'total' => $request->total,
            'cliente' => $request->cliente,
        ]);

        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto creado correctamente.');
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
    public function edit(Presupuesto $presupuesto)
    {
        $clientes = Cliente::orderBy('nombre', 'asc')->orderBy('apellidos', 'asc')->get();

        $estados = EstadosPresupuesto::all();

        return view('presupuestos.edit', compact('presupuesto', 'clientes', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        $request->validate([
            'codigo' => [
                'required',
                'string',
                Rule::unique('presupuestos', 'codigo')
                    ->ignore($presupuesto->id) // No tener en cuenta el propio codigo
                    ->whereNull('deleted_at'), // Ignora los soft deleted
            ],
            'fecha' => 'required|date',
            'titulo' => 'required|string|max:255',
            'estado' => 'nullable|exists:estados_presupuestos,id',
            'total' => 'nullable|numeric|min:0',
            'cliente' => 'nullable|exists:clientes,id',
        ]);

        $presupuesto->update([
            'codigo' => $request->codigo,
            'fecha' => $request->fecha,
            'titulo' => $request->titulo,
            'estado' => $request->estado,
            'total' => $request->total,
            'cliente' => $request->cliente,
        ]);

        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto creado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presupuesto $presupuesto)
    {
        $presupuesto->delete();

        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto eliminado correctamente.');
    }
}
