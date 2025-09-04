@extends('layouts.app')

@section('title', 'Editar Presupuesto')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Editar Presupuesto</h1>
        </div>
        <div class="section-body">
            <form action="{{ route('presupuestos.update', $presupuesto->id) }}" method="POST"> 
                @csrf
                @method('PUT')
                <div class="d-flex mt-4 mb-4 align-items-center">
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="fas fa-save mr-1"></i> Guardar
                    </button>
                    <a href="{{ route('presupuestos.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-arrow-left mr-1"></i> Volver
                    </a>
                    <button type="button" class="btn btn-danger" onclick="if(confirm('¿Estás seguro de eliminar este presupuesto?')) document.getElementById('deleteForm').submit();">
                        <i class="fas fa-trash-alt mr-1"></i> Eliminar
                    </button>
                </div>
                <div class="form-group">
                    <label for="codigo" class="@error('codigo') text-danger @enderror">Codigo:</label>
                    <input type="text"
                        class="form-control @error('codigo') is-invalid @enderror"
                        id="codigo"
                        name="codigo"
                        value="{{ $presupuesto->codigo }}"
                        readonly>
                    @error('codigo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fecha" class="@error('fecha') text-danger @enderror">Fecha*:</label>
                    <input type="date"
                        class="form-control @error('fecha') is-invalid @enderror"
                        id="fecha"
                        name="fecha"
                        value="{{ $presupuesto->fecha }}"
                        required>
                    @error('fecha')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="titulo" class="@error('titulo') text-danger @enderror">Titulo*:</label>
                    <input type="text"
                        class="form-control @error('titulo') is-invalid @enderror"
                        id="titulo"
                        name="titulo"
                        value="{{ $presupuesto->titulo }}"
                        required>
                    @error('titulo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="estado" class="@error('estado') text-danger @enderror">Estado*:</label>
                    <select class="form-control"
                        id="estado"
                        name="estado">
                        @foreach($estados as $estado)
                        <option value="{{ $estado->id }}" {{ $presupuesto->estado == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }} {{ $estado->apellidos }}
                        </option>
                        @endforeach
                    </select>
                    @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total" class="@error('total') text-danger @enderror">Total (€):</label>
                    <input type="number"
                        class="form-control"
                        id="total"
                        name="total"
                        value="{{ $presupuesto->total }}">
                    @error('total')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cliente" class="@error('cliente') text-danger @enderror">Cliente:</label>
                    <select class="form-control"
                        id="cliente"
                        name="cliente">
                        <option value="">-- Selecciona un cliente --</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $presupuesto->cliente == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }} {{ $cliente->apellidos }}
                        </option>
                        @endforeach
                    </select>
                    @error('cliente')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </form>
            <form id="deleteForm" action="{{ route('presupuestos.destroy', $presupuesto->id) }}" method="POST" style="display:none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </section>
</div>
@endsection