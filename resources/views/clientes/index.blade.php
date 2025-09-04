@extends('layouts.app')

@section('title', 'Clientes')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Clientes</h1>
        </div>

        <div class="section-body">
            <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-4">
                <i class="fas fa-plus mr-2"></i> Nuevo Cliente
            </a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Provincia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr class="pointer" style="cursor:pointer;" onclick="window.location='{{ route("clientes.edit", $cliente->id) }}'">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cliente->dni }}</td>
                            <td>{{ $cliente->nombre }} {{ $cliente->apellidos }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->provinciaRelacion ? $cliente->provinciaRelacion->nombre : '' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->
@endpush