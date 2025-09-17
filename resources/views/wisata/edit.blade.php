<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Tempat Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inknut Antiqua', serif;
            background: url("{{ asset('images/bg-kotabaru.jpg') }}") no-repeat center center fixed;
            background-size: cover;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 15px;
            max-width: 800px;
            margin: 40px auto;
        }

        h5 {
            text-align: center;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            color: #1e3932;
        }

        label {
            font-weight: 600;
            margin-top: 10px;
        }

        .btn-submit {
            background-color: #1e3932;
            color: #fff;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 8px;
        }

        .btn-submit:hover {
            background-color: #2d5447;
        }
    </style>
</head>

<body>
    <div class="container">
        <h5 class="mt-4">Kotabaru Tourism Data Center</h5>
        <h2>Edit Tempat Wisata</h2>

        <div class="form-container shadow">
            <form method="POST" action="{{ route('wisata.update', $wisata->id_wisata) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama Tempat Wisata</label>
                    <input type="text" name="nama_wisata" class="form-control" value="{{ $wisata->nama_wisata }}"
                        required>
                </div>
                <div class="mb-3">
                    <label>Kategori Tempat Wisata</label>
                    <input type="text" name="kategori_wisata" class="form-control"
                        value="{{ $wisata->kategori_wisata }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="{{ $wisata->longitude }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="{{ $wisata->latitude }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label>Deskripsi Wisata</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $wisata->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Sejarah Wisata</label>
                    <textarea name="sejarah" class="form-control" rows="3">{{ $wisata->sejarah }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Narasi Wisata</label>
                    <textarea name="narasi" class="form-control" rows="3">{{ $wisata->narasi }}</textarea>
                </div>

                <!-- Jam Operasional (opsional, kalau mau diisi manual lagi) -->
                <div class="row">
                    <div class="mb-3">
                        <label class="fw-bold">Jam Operasional</label>
                        <div class="row">
                            @php
                                $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                $jamOps = $wisata->jamOperasional->keyBy('hari');
                            @endphp

                            <h5>Jam Operasional</h5>
                            @foreach ($days as $day)
                                <div class="row mb-2">
                                    <div class="col-md-2"><label>{{ $day }}</label></div>
                                    <div class="col-md-2">Buka</div>
                                    <div class="col-md-3">
                                        <input type="time" name="jam_buka[{{ $day }}]"
                                            value="{{ $jamOps[$day]->jam_buka ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-2">Tutup</div>
                                    <div class="col-md-3">
                                        <input type="time" name="jam_tutup[{{ $day }}]"
                                            value="{{ $jamOps[$day]->jam_tutup ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <input type="checkbox" name="libur[{{ $day }}]" value="1"
                                            {{ empty($jamOps[$day]->jam_buka) && empty($jamOps[$day]->jam_tutup) ? 'checked' : '' }}>
                                        Libur
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <small class="text-muted">Kosongkan jika tidak ada pergantian jam</small>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.querySelectorAll(".tutup-check").forEach(function(checkbox) {
                                checkbox.addEventListener("change", function() {
                                    let row = this.closest(".d-flex");
                                    let inputs = row.querySelectorAll("input[type='time']");
                                    if (this.checked) {
                                        inputs.forEach(i => {
                                            i.disabled = true;
                                            i.value = '';
                                        });
                                    } else {
                                        inputs.forEach(i => {
                                            i.disabled = false;
                                        });
                                    }
                                });
                            });
                        });
                    </script>

                    <div class="mb-3">
                        <label>Foto Lama</label><br>
                        @foreach ($wisata->foto as $f)
                            <img src="{{ asset('storage/' . $f->path_foto) }}" alt="Foto {{ $wisata->nama_wisata }}"
                                width="100" class="me-2 mb-2">
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label>Upload Foto Baru</label>
                        <input type="file" name="foto[]" class="form-control" multiple>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-submit">Update</button>
                    <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
