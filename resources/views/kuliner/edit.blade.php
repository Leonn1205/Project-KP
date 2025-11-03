<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Tempat Kuliner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inknut Antiqua', serif;
            background: url("{{ asset('images/bg-view.png') }}") no-repeat center center fixed;
            background-size: cover;
            display: block;
            justify-content: center;
            align-items: center;
        }

        .container-form {
            max-width: 900px;
            margin: 30px auto;
        }

        .section {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 40px;
        }

        .section-title {
            text-align: center;
            font-weight: bold;
            font-size: 22px;
            margin-bottom: 25px;
            color: #1e3932;
        }

        .btn-submit {
            background-color: #1e3932;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 10px 30px;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #2d5447;
            transform: translateY(-2px);
        }

        .btn-cancel {
            background-color: #b0b0b0;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 10px 30px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background-color: #8c8c8c;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="container-form">
        <h2 class="text-center mb-4">Kotabaru Tourism Data Center<br><b>Edit Tempat Kuliner</b></h2>

        <form action="{{ route('kuliner.update', $kuliner->id_kuliner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- SECTION 1: Identitas --}}
            <div class="section">
                <h3 class="section-title">1. Identitas Establishment</h3>
                <div class="mb-3">
                    <label class="form-label">Nama Tempat Kuliner</label>
                    <input type="text" name="nama_usaha" class="form-control"
                        value="{{ old('nama_usaha', $kuliner->nama_usaha) }}">
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Tahun Berdiri</label>
                        <input type="number" name="tahun_berdiri" class="form-control"
                            value="{{ old('tahun_berdiri', $kuliner->tahun_berdiri) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" class="form-control"
                            value="{{ old('nama_pemilik', $kuliner->nama_pemilik) }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Legalitas</label>
                    <input type="text" name="status_legalitas" class="form-control"
                        value="{{ old('status_legalitas', $kuliner->status_legalitas) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Lokasi Lengkap</label>
                    <textarea name="lokasi_lengkap" class="form-control">{{ old('lokasi_lengkap', $kuliner->lokasi_lengkap) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bentuk Kepemilikan</label>
                    <select name="bentuk_kepemilikan" class="form-select">
                        @foreach (['Individu', 'Keluarga', 'Komunitas', 'Waralaba'] as $val)
                            <option value="{{ $val }}"
                                {{ old('bentuk_kepemilikan', $kuliner->bentuk_kepemilikan) === $val ? 'selected' : '' }}>
                                {{ $val }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- SECTION 2: Jenis Kuliner --}}
            <div class="section">
                <h3 class="section-title">2. Jenis Kuliner</h3>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Kategori Utama</label>
                        <select name="kategori_utama" class="form-select">
                            @foreach (['Tradisional', 'Modern', 'Fusion', 'Street Food'] as $val)
                                <option value="{{ $val }}"
                                    {{ old('kategori_utama', $kuliner->kategori_utama) === $val ? 'selected' : '' }}>
                                    {{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Sumber Bahan Baku</label><br>
                        @php $bahan = json_decode($kuliner->bahan_baku ?? '[]'); @endphp
                        @foreach (['Lokal', 'Import'] as $val)
                            <label class="me-2">
                                <input type="checkbox" name="bahan_baku[]" value="{{ $val }}"
                                    {{ in_array($val, old('bahan_baku', $bahan)) ? 'checked' : '' }}>
                                {{ $val }}
                            </label>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jenis Menu</label><br>
                        @php $jenisMenu = json_decode($kuliner->jenis_menu ?? '[]'); @endphp
                        @foreach (['Seasonal', 'Tetap'] as $val)
                            <label class="me-2">
                                <input type="checkbox" name="jenis_menu[]" value="{{ $val }}"
                                    {{ in_array($val, old('jenis_menu', $jenisMenu)) ? 'checked' : '' }}>
                                {{ $val }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Menu Unggulan</label>
                    <input type="text" name="menu_unggulan" class="form-control"
                        value="{{ old('menu_unggulan', $kuliner->menu_unggulan) }}">
                </div>
            </div>

            {{-- SECTION 3: Jenis Tempat --}}
            <div class="section">
                <h3 class="section-title">3. Jenis Tempat</h3>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label class="form-label">Bentuk Fisik</label>
                        <select name="bentuk_fisik" class="form-select">
                            @foreach (['Warung Kaki Lima', 'Kedai Rumahan', 'Restoran', 'Gerobak Keliling'] as $val)
                                <option value="{{ $val }}"
                                    {{ old('bentuk_fisik', $kuliner->bentuk_fisik) === $val ? 'selected' : '' }}>
                                    {{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status Bangunan</label>
                        <select name="status_bangunan" class="form-select">
                            @foreach (['Milik Sendiri', 'Sewa', 'Tempat Publik'] as $val)
                                <option value="{{ $val }}"
                                    {{ old('status_bangunan', $kuliner->status_bangunan) === $val ? 'selected' : '' }}>
                                    {{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fasilitas</label>
                    <textarea name="fasilitas" class="form-control">{{ old('fasilitas', $kuliner->fasilitas) }}</textarea>
                </div>
            </div>

            {{-- SECTION 4: Praktik K3 --}}
            <div class="section">
                <h3 class="section-title">4. Praktik K3</h3>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">APD</label>
                        <select name="apd" class="form-select">
                            <option value="1" {{ old('apd', $kuliner->apd) ? 'selected' : '' }}>Ya</option>
                            <option value="0" {{ !old('apd', $kuliner->apd) ? 'selected' : '' }}>Tidak</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Pengelolaan Limbah</label><br>
                        @php $limbah = json_decode($kuliner->pengelolaan_limbah ?? '[]'); @endphp
                        @foreach (['Organik', 'Non-Organik'] as $val)
                            <label class="me-2">
                                <input type="checkbox" name="pengelolaan_limbah[]" value="{{ $val }}"
                                    {{ in_array($val, old('pengelolaan_limbah', $limbah)) ? 'checked' : '' }}>
                                {{ $val }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3"><label>Prosedur Kebersihan</label>
                    <textarea name="prosedur_kebersihan" class="form-control">{{ old('prosedur_kebersihan', $kuliner->prosedur_kebersihan) }}</textarea>
                </div>
                <div class="mb-3"><label>Sumber Bahan Dasar</label>
                    <textarea name="sumber_bahan_dasar" class="form-control">{{ old('sumber_bahan_dasar', $kuliner->sumber_bahan_dasar) }}</textarea>
                </div>
                <div class="mb-3"><label>Ventilasi</label>
                    <textarea name="ventilasi" class="form-control">{{ old('ventilasi', $kuliner->ventilasi) }}</textarea>
                </div>
                <div class="mb-3"><label>Pelatihan K3</label>
                    <textarea name="pelatihan_k3" class="form-control">{{ old('pelatihan_k3', $kuliner->pelatihan_k3) }}</textarea>
                </div>
            </div>

            {{-- SECTION 5: Regulasi --}}
            <div class="section">
                <h3 class="section-title">5. Regulasi</h3>

                {{-- Sertifikasi --}}
                <div class="mb-3">
                    <label class="form-label">Sertifikasi</label>
                    <div class="d-flex gap-3 align-items-center flex-wrap">
                        <label class="mb-0">
                            <input type="checkbox" name="sertifikasi[]" value="PIRT"
                                {{ in_array('PIRT', $sertifikasi) ? 'checked' : '' }}> PIRT
                        </label>
                        <label class="mb-0">
                            <input type="checkbox" name="sertifikasi[]" value="BPOM"
                                {{ in_array('BPOM', $sertifikasi) ? 'checked' : '' }}> BPOM
                        </label>
                        <label class="mb-0">
                            <input type="checkbox" name="sertifikasi[]" value="Halal"
                                {{ in_array('Halal', $sertifikasi) ? 'checked' : '' }}> Halal
                        </label>
                        <div class="d-flex align-items-center">
                            <label class="mb-0 me-2">
                                <input type="checkbox" name="sertifikasi[]" value="Dll"
                                    {{ $dllText ? 'checked' : '' }}> Dll
                            </label>
                            <input type="text" name="sertifikasi_dll" class="form-control form-control-sm"
                                style="width: 150px;" placeholder="Isi sertifikasi lain"
                                value="{{ old('sertifikasi_dll', $dllText) }}">
                        </div>
                    </div>
                </div>

                {{-- Kepatuhan --}}
                <div class="mb-3">
                    <label class="form-label">Kepatuhan Zonasi</label>
                    <textarea name="kepatuhan_zonasi" class="form-control">{{ old('kepatuhan_zonasi', $kuliner->kepatuhan_zonasi) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kepatuhan Operasional</label>
                    <textarea name="kepatuhan_operasional" class="form-control">{{ old('kepatuhan_operasional', $kuliner->kepatuhan_operasional) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kepatuhan Pajak</label>
                    <textarea name="kepatuhan_pajak" class="form-control">{{ old('kepatuhan_pajak', $kuliner->kepatuhan_pajak) }}</textarea>
                </div>

                {{-- Program Pemerintah --}}
                <div class="mb-3">
                    <label class="form-label">Program Pemerintah</label>
                    <div class="d-flex gap-3 align-items-center flex-wrap">
                        <label class="mb-0">
                            <input type="checkbox" name="program_pemerintah[]" value="Kuliner Sehat"
                                {{ in_array('Kuliner Sehat', $program) ? 'checked' : '' }}> Kuliner Sehat
                        </label>
                        <label class="mb-0">
                            <input type="checkbox" name="program_pemerintah[]" value="UMKM Binaan"
                                {{ in_array('UMKM Binaan', $program) ? 'checked' : '' }}> UMKM Binaan
                        </label>
                        <div class="d-flex align-items-center">
                            <label class="mb-0 me-2">
                                <input type="checkbox" name="program_pemerintah[]" value="Dll"
                                    {{ $programDll ? 'checked' : '' }}> Dll
                            </label>
                            <input type="text" name="program_dll" class="form-control form-control-sm"
                                style="width: 150px;" placeholder="Isi program lain"
                                value="{{ old('program_dll', $programDll) }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 6: Pelanggan --}}
            <div class="section">
                <h3 class="section-title">6. Perkiraan Pelanggan</h3>
                <div class="mb-3">
                    <label>Rata-rata Pelanggan</label>
                    <input type="number" name="rata_pelanggan" class="form-control"
                        value="{{ old('rata_pelanggan', $kuliner->rata_pelanggan) }}">
                </div>
                @php $profil = json_decode($kuliner->profil_pelanggan ?? '[]'); @endphp
                <div class="mb-3">
                    <label>Profil Pelanggan</label><br>
                    @foreach (['Lokal', 'Wisatawan', 'Pelajar / Mahasiswa', 'Pekerja'] as $val)
                        <label class="me-2">
                            <input type="checkbox" name="profil_pelanggan[]" value="{{ $val }}"
                                {{ in_array($val, old('profil_pelanggan', $profil)) ? 'checked' : '' }}>
                            {{ $val }}
                        </label>
                    @endforeach
                </div>
                @php $metode = json_decode($kuliner->metode_transaksi ?? '[]'); @endphp
                <div class="mb-3">
                    <label>Metode Transaksi</label><br>
                    @foreach (['Tunai', 'Qris', 'Online Delivery'] as $val)
                        <label class="me-2">
                            <input type="checkbox" name="metode_transaksi[]" value="{{ $val }}"
                                {{ in_array($val, old('metode_transaksi', $metode)) ? 'checked' : '' }}>
                            {{ $val }}
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- SECTION 7: Longlat --}}
            <div class="section">
                <h3 class="section-title">7. Koordinat Lokasi</h3>
                <div class="row">
                    <div class="col-md-6">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control"
                            value="{{ old('longitude', $kuliner->longitude) }}">
                    </div>
                    <div class="col-md-6">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control"
                            value="{{ old('latitude', $kuliner->latitude) }}">
                    </div>
                </div>
            </div>

            {{-- SECTION 8: Foto --}}
            <div class="section">
                <h3 class="section-title">8. Foto Kuliner</h3>
                <div class="mb-3">
                    <label>Upload Foto Baru</label>
                    <input type="file" name="foto[]" class="form-control" multiple>
                </div>
                <div class="row">
                    @foreach ($kuliner->foto as $foto)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('storage/' . $foto->path_foto) }}" class="img-fluid rounded">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center mt-5">
                <button type="submit" class="btn btn-submit me-3 px-4">
                    <i class="bi bi-save me-1"></i> Update
                </button>
                <a href="{{ route('kuliner.index') }}" class="btn btn-cancel px-4">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</body>

</html>
