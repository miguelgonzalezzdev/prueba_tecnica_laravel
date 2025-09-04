@extends('layouts.app')

@section('title', 'Provincias')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Provincias</h1>
        </div>

        <div class="section-body">
            <a href="{{ route('provincias.create') }}" class="btn btn-primary mb-4">
                <i class="fas fa-plus mr-2"></i> Nueva Provincia
            </a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($provincias as $provincia)
                        <tr class="pointer" style="cursor:pointer;" onclick="window.location='{{ route("provincias.edit", $provincia->id) }}'">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $provincia->nombre }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<!-- JS Libraries -->
@endpush