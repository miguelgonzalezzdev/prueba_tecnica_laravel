@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Editar Cliente</h1>
        </div>
        <div class="section-body">
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex mt-4 mb-4 align-items-center">
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="fas fa-save mr-1"></i> Guardar
                    </button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-arrow-left mr-1"></i> Volver
                    </a>
                    <button type="button" class="btn btn-danger" onclick="if(confirm('¿Estás seguro de eliminar este cliente?')) document.getElementById('deleteForm').submit();">
                        <i class="fas fa-trash-alt mr-1"></i> Eliminar
                    </button>
                </div>
                <div class="form-group">
                    <label for="dni" class="@error('dni') text-danger @enderror">DNI*:</label>
                    <input type="text"
                        class="form-control @error('dni') is-invalid @enderror"
                        id="dni"
                        name="dni"
                        value="{{ $cliente->dni }}"
                        required>
                    @error('dni')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nombre" class="@error('nombre') text-danger @enderror">Nombre*:</label>
                    <input type="text"
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        name="nombre"
                        value="{{ $cliente->nombre }}"
                        required>
                    @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="apellidos" class="@error('apellidos') text-danger @enderror">Apellidos*:</label>
                    <input type="text"
                        class="form-control @error('apellidos') is-invalid @enderror"
                        id="apellidos"
                        name="apellidos"
                        value="{{ $cliente->apellidos }}"
                        required>
                    @error('apellidos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telefono" class="@error('telefono') text-danger @enderror">Telefono:</label>
                    <input type="number"
                        class="form-control"
                        id="telefono"
                        name="telefono"
                        max="999999999"
                        value="{{ $cliente->telefono }}"">
                    @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="email" class="@error('email') text-danger @enderror">Email:</label>
                    <input type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ $cliente->email }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="provincia" class="@error('provincia') text-danger @enderror">Provincia:</label>
                    <select class="form-control" id="provincia" name="provincia">
                        <option value="">-- Selecciona una provincia --</option>
                        @foreach($provincias as $prov)
                        <option value="{{ $prov->id }}"
                            {{ old('provincia', isset($cliente) ? $cliente->provincia : '') == $prov->id ? 'selected' : '' }}>
                            {{ $prov->nombre }}
                        </option>
                        @endforeach
                    </select>
                    @error('provincia')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </form>
            <form id="deleteForm" action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </section>
</div>
@endsection