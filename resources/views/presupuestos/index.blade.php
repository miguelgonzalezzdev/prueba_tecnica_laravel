@extends('layouts.app')

@section('title', 'Presupuestos')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Presupuestos</h1>
        </div>

        <div class="section-body">
            <a href="{{ route('presupuestos.create') }}" class="btn btn-primary mb-4">
                <i class="fas fa-plus mr-2"></i> Nuevo Cliente
            </a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Cliente</th>
                            <th>Provincia</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($presupuestos as $presupuesto)
                        <tr class="pointer" style="cursor:pointer;" onclick="window.location='{{ route("presupuestos.edit", $cliente->id) }}'">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $presupuesto->Codigo }}</td>
                            <td>{{ $presupuesto->total }}</td>
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