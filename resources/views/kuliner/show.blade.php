<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Tempat Kuliner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007b5e;
            border-bottom: 3px solid #007b5e;
            padding-bottom: 8px;
        }

        h3 {
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 4px;
            margin-top: 25px;
        }

        .label {
            font-weight: bold;
            color: #444;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .table th {
            background-color: #007b5e;
            color: #fff;
        }

        .photos img {
            width: 160px;
            height: 120px;
            object-fit: cover;
            border-radius: 6px;
            margin: 6px;
        }

        .section p {
            margin: 4px 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>{{ $kuliner->nama_usaha }}</h1>

        {{-- Identitas Usaha --}}
        <h3>Identitas Usaha</h3>
        <div class="section">
            <p><span class="label">Nama Usaha:</span> {{ $kuliner->nama_usaha }}</p>
            <p><span class="label">Pemilik:</span> {{ $kuliner->nama_pemilik ?? '-' }}</p>
            <p><span class="label">Tahun Berdiri:</span> {{ $kuliner->tahun_berdiri ?? '-' }}</p>
            <p><span class="label">Status Legalitas:</span> {{ $kuliner->status_legalitas ?? '-' }}</p>
            <p><span class="label">Lokasi Lengkap:</span> {{ $kuliner->lokasi_lengkap ?? '-' }}</p>
            <p><span class="label">Bentuk Kepemilikan:</span> {{ $kuliner->bentuk_kepemilikan ?? '-' }}</p>
        </div>

        {{-- Jenis Kuliner --}}
        <h3>Jenis Kuliner</h3>
        <div class="section">
            <p><span class="label">Kategori Utama:</span> {{ $kuliner->kategori_utama ?? '-' }}</p>
            <p><span class="label">Menu Unggulan:</span> {{ $kuliner->menu_unggulan ?? '-' }}</p>
            <p><span class="label">Bahan Baku:</span>
                @php
                    $bahan = is_array($kuliner->bahan_baku)
                        ? $kuliner->bahan_baku
                        : json_decode($kuliner->bahan_baku, true);
                @endphp
                {{ is_array($bahan) ? implode(', ', $bahan) : $kuliner->bahan_baku ?? '-' }}
            </p>

            <p><span class="label">Jenis Menu:</span>
                @php
                    $jenis = is_array($kuliner->jenis_menu)
                        ? $kuliner->jenis_menu
                        : json_decode($kuliner->jenis_menu, true);
                @endphp
                {{ is_array($jenis) ? implode(', ', $jenis) : $kuliner->jenis_menu ?? '-' }}
            </p>

        </div>

        {{-- Jenis Tempat --}}
        <h3>Jenis Tempat</h3>
        <div class="section">
            <p><span class="label">Bentuk Fisik:</span> {{ $kuliner->bentuk_fisik ?? '-' }}</p>
            <p><span class="label">Status Bangunan:</span> {{ $kuliner->status_bangunan ?? '-' }}</p>
            <p><span class="label">Fasilitas:</span> {{ $kuliner->fasilitas ?? '-' }}</p>
        </div>

        {{-- Praktik K3 --}}
        <h3>Praktik K3</h3>
        <div class="section">
            <p><span class="label">APD:</span> {{ $kuliner->apd ? 'Ya' : 'Tidak' }}</p>
            <p><span class="label">Prosedur Kebersihan:</span> {{ $kuliner->prosedur_kebersihan ?? '-' }}</p>
            <p><span class="label">Sumber Bahan Dasar:</span> {{ $kuliner->sumber_bahan_dasar ?? '-' }}</p>
            <p><span class="label">Ventilasi:</span> {{ $kuliner->ventilasi ?? '-' }}</p>
            <p><span class="label">Pelatihan K3:</span> {{ $kuliner->pelatihan_k3 ?? '-' }}</p>
            <p><span class="label">Pengelolaan Limbah:</span>
                @php
                    $limbah = is_array($kuliner->pengelolaan_limbah)
                        ? $kuliner->pengelolaan_limbah
                        : json_decode($kuliner->pengelolaan_limbah, true);
                @endphp
                {{ is_array($limbah) ? implode(', ', $limbah) : $kuliner->pengelolaan_limbah ?? '-' }}
            </p>
        </div>

        {{-- Regulasi --}}
        <h3>Regulasi</h3>
        <div class="section">
            <p><span class="label">Sertifikasi:</span>
                @php
                    $sertifikasi = is_array($kuliner->sertifikasi)
                        ? $kuliner->sertifikasi
                        : json_decode($kuliner->sertifikasi, true);
                @endphp
                {{ is_array($kuliner->sertifikasi) ? implode(', ', $kuliner->sertifikasi) : $kuliner->sertifikasi ?? '-' }}
            </p>
            <p><span class="label">Kepatuhan Zonasi:</span> {{ $kuliner->kepatuhan_zonasi ?? '-' }}</p>
            <p><span class="label">Kepatuhan Operasional:</span> {{ $kuliner->kepatuhan_operasional ?? '-' }}</p>
            <p><span class="label">Kepatuhan Pajak:</span> {{ $kuliner->kepatuhan_pajak ?? '-' }}</p>

            <p><span class="label">Program Pemerintah:</span>
                {{ is_array($kuliner->program_pemerintah) ? implode(', ', $kuliner->program_pemerintah) : $kuliner->program_pemerintah ?? '-' }}
            </p>
        </div>

        {{-- Perkiraan Pelanggan --}}
        <h3>Perkiraan Pelanggan</h3>
        <div class="section">
            <p><span class="label">Rata-rata Pelanggan:</span> {{ $kuliner->rata_pelanggan ?? '-' }}</p>
            <p><span class="label">Profil Pelanggan:</span>
                @php
                    $profil = is_array($kuliner->profil_pelanggan)
                        ? $kuliner->profil_pelanggan
                        : json_decode($kuliner->profil_pelanggan, true);
                @endphp
                {{ is_array($profil) ? implode(', ', $profil) : $kuliner->profil_pelanggan ?? '-' }}
            </p>
            <p><span class="label">Metode Transaksi:</span>
                @php
                    $metode = is_array($kuliner->metode_transaksi)
                    ? $kuliner->metode_transaksi
                    : json_decode($kuliner->metode_transaksi, true);
                @endphp
                {{ is_array($metode) ? implode(', ', $metode) : $kuliner->metode_transaksi ?? '-' }}
            </p>
        </div>

        {{-- Koordinat --}}
        <h3>Koordinat Lokasi</h3>
        <div class="section">
            <p><span class="label">Latitude:</span> {{ $kuliner->latitude ?? '-' }}</p>
            <p><span class="label">Longitude:</span> {{ $kuliner->longitude ?? '-' }}</p>
        </div>

        {{-- Jam Operasional --}}
        <h3>Jam Operasional</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kuliner->jamOperasional as $jam)
                    <tr>
                        <td>{{ $jam->hari }}</td>
                        <td>{{ $jam->jam_buka ?? '-' }}</td>
                        <td>{{ $jam->jam_tutup ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Foto --}}
        <h3>Foto</h3>
        <div class="photos">
            @foreach ($kuliner->foto as $foto)
                <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="Foto {{ $kuliner->nama_usaha }}">
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('kuliner.index') }}"
                style="display: inline-block; padding: 10px 20px; background-color: #007b5e; color: #fff; text-decoration: none; border-radius: 5px; font-weight: bold;">
                ← Kembali ke Daftar Kuliner
            </a>
        </div>
    </div>

</body>

</html>
