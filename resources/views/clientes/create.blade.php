@extends('layouts.app')

@section('title', 'Nuevo Cliente')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Nuevo Cliente</h1>
        </div>
        <div class="section-body">
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="d-flex mt-4 mb-4 align-items-center">
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="fas fa-save mr-1"></i> Guardar
                    </button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-arrow-left mr-1"></i> Volver
                    </a>
                </div>
                <div class="form-group">
                    <label for="dni" class="@error('dni') text-danger @enderror">DNI*:</label>
                    <input type="text"
                        class="form-control @error('dni') is-invalid @enderror"
                        id="dni"
                        name="dni"
                        value="{{ old('dni') }}"
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
                        value="{{ old('nombre') }}"
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
                        value="{{ old('apellidos') }}"
                        required>
                    @error('apellidos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="number"
                        class="form-control"
                        id="telefono"
                        name="telefono"
                        value="{{ old('telefono') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="provincia">Provincia:</label>
                    <select class="form-control"
                        id="provincia"
                        name="provincia">
                        <option value="">-- Selecciona una provincia --</option>
                        @foreach($provincias as $provincia)
                        <option value="{{ $provincia->id }}" {{ old('provincia') == $provincia->id ? 'selected' : '' }}>
                            {{ $provincia->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection