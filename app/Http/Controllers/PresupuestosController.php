<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\EstadosPresupuesto;
use App\Models\Presupuesto;
use Illuminate\Http\Request;

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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
