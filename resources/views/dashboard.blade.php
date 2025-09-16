@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">📝 Tambah Tempat</h5>
                    <p class="card-text">Input tempat kuliner atau wisata baru ke sistem.</p>
                    <a href="{{ route('tempat.create') }}" class="btn btn-primary w-100">Tambah Tempat</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">📍 Lihat Peta</h5>
                    <p class="card-text">Lihat lokasi semua tempat dalam peta interaktif.</p>
                    <a href="{{ route('peta.index') }}" class="btn btn-success w-100">Lihat Peta</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">📊 Data Tempat</h5>
                    <p class="card-text">Lihat semua data tempat yang sudah dimasukkan.</p>
                    <a href="{{ route('tempat.index') }}" class="btn btn-secondary w-100">Lihat Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
