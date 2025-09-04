@extends('layouts.app')

@section('title', 'Editar Provincia')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Editar Provincia</h1>
        </div>
        <div class="section-body">
            <!-- Formulario de edición -->
            <form action="{{ route('provincias.update', $provincia->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex mt-4 mb-4 align-items-center">
                    <!-- Botón Guardar con icono -->
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="fas fa-save mr-1"></i> Guardar
                    </button>
                    <a href="{{ route('provincias') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-arrow-left mr-1"></i> Volver
                    </a>
                    <button type="button" class="btn btn-danger" onclick="if(confirm('¿Estás seguro de eliminar esta provincia?')) document.getElementById('deleteForm').submit();">
                        <i class="fas fa-trash-alt mr-1"></i> Eliminar
                    </button>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $provincia->nombre }}" required>
                </div>
            </form>
            <form id="deleteForm" action="{{ route('provincias.destroy', $provincia->id) }}" method="POST" style="display:none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </section>
</div>
@endsection