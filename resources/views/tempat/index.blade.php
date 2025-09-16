@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar Tempat Kuliner & Wisata</h2>

    <div class="row">
        @foreach ($tempat as $item)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                    <a href="{{ route('tempat.show', $item->id) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
