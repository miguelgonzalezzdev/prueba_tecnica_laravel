@extends('layouts.app')

@section('title', 'Nueva Provincia')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Nueva Provincia</h1>
        </div>
        <div class="section-body">
            <form action="{{ route('provincias.store') }}" method="POST">
                <div class="d-flex mt-4 mb-4 align-items-center">
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="fas fa-save mr-1"></i> Guardar
                    </button>
                    <a href="{{ route('provincias.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-arrow-left mr-1"></i> Volver
                    </a>
                </div>
                @csrf
                <div class="form-group">
                    <label for="nombre" class="@error('nombre') text-danger @enderror">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                    @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
