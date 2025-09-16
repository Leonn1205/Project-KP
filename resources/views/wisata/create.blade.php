@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Tempat Wisata</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama Wisata -->
        <div class="mb-3">
            <label for="nama_wisata" class="form-label">Nama Wisata</label>
            <input type="text" name="nama_wisata" id="nama_wisata" class="form-control" required>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label for="kategori_wisata" class="form-label">Kategori Wisata</label>
            <select name="kategori_wisata" id="kategori_wisata" class="form-select" required>
                <option value="Alam">Alam</option>
                <option value="Budaya">Budaya</option>
                <option value="Sejarah">Sejarah</option>
                <option value="Religi">Religi</option>
            </select>
        </div>

        <!-- Longlat -->
        <div class="row mb-3">
            <div class="col">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" required>
            </div>
            <div class="col">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control" required>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"></textarea>
        </div>

        <!-- Sejarah -->
        <div class="mb-3">
            <label for="sejarah" class="form-label">Sejarah</label>
            <textarea name="sejarah" id="sejarah" rows="3" class="form-control"></textarea>
        </div>

        <!-- Narasi -->
        <div class="mb-3">
            <label for="narasi" class="form-label">Narasi</label>
            <textarea name="narasi" id="narasi" rows="3" class="form-control"></textarea>
        </div>

        <!-- Jam Operasional -->
        <h5 class="mt-4">Jam Operasional</h5>
        <div id="jam-operasional">
            @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                <div class="row mb-2">
                    <div class="col-3">
                        <input type="hidden" name="hari[]" value="{{ $hari }}">
                        <label class="form-label">{{ $hari }}</label>
                    </div>
                    <div class="col">
                        <input type="time" name="jam_buka[]" class="form-control" placeholder="Jam Buka">
                    </div>
                    <div class="col">
                        <input type="time" name="jam_tutup[]" class="form-control" placeholder="Jam Tutup">
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Foto -->
        <div class="mb-3 mt-4">
            <label for="foto" class="form-label">Foto (boleh lebih dari satu)</label>
            <input type="file" name="foto[]" id="foto" class="form-control" multiple>
        </div>

        <!-- Tombol -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ url('/dashboard_user') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
