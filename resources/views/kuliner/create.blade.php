<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Tempat Kuliner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
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
            font-size: 24px;
            margin-bottom: 25px;
            color: #1e3932;
        }

        .btn-submit {
            display: block;
            margin: 20px auto;
            background: #1e3932;
            color: white;
            border-radius: 10px;
            padding: 10px 30px;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container-form">
        <h2 class="text-center mb-4">Kotabaru Tourism Data Center<br><b>Tambah Tempat Kuliner</b></h2>

        <form action="{{ route('kuliner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 1. Identitas -->
            <div class="section">
                <h3 class="section-title">1. Identitas Establishment</h3>
                <div class="mb-3">
                    <label class="form-label">Nama Tempat Kuliner</label>
                    <input type="text" name="nama_usaha" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Tahun Berdiri</label>
                        <input type="number" name="tahun_berdiri" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Legalitas</label>
                    <input type="text" name="status_legalitas" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Lokasi Tempat Kuliner</label>
                    <textarea name="lokasi_lengkap" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bentuk Kepemilikan</label>
                    <select name="bentuk_kepemilikan" class="form-select">
                        <option value="Individu">Individu</option>
                        <option value="Keluarga">Keluarga</option>
                        <option value="Komunitas">Komunitas</option>
                        <option value="Waralaba">Waralaba</option>
                    </select>
                </div>
            </div>

            <!-- 2. Jenis Kuliner -->
            <div class="section">
                <h3 class="section-title">2. Jenis Kuliner</h3>
                <div class="row mb-3">
                    <!-- Kategori Utama -->
                    <div class="col-md-4">
                        <label class="form-label">Kategori Utama</label>
                        <select name="kategori_utama" class="form-select">
                            <option value="Tradisional">Tradisional</option>
                            <option value="Modern">Modern</option>
                            <option value="Fusion">Fusion</option>
                            <option value="Street Food">Street Food</option>
                        </select>
                    </div>

                    <!-- Sumber Bahan Baku -->
                    <div class="col-md-4">
                        <label class="form-label">Sumber Bahan Baku</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="bahan_baku[]" value="Lokal">
                            <label class="form-check-label">Lokal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="bahan_baku[]" value="Import">
                            <label class="form-check-label">Import</label>
                        </div>
                    </div>

                    <!-- Jenis Menu -->
                    <div class="col-md-4">
                        <label class="form-label">Jenis Menu</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="jenis_menu[]" value="Seasonal">
                            <label class="form-check-label">Seasonal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="jenis_menu[]" value="Tetap">
                            <label class="form-check-label">Tetap</label>
                        </div>
                    </div>
                </div>

                <!-- Menu Unggulan -->
                <div class="mb-3">
                    <label class="form-label">Jenis Menu Unggulan</label>
                    <input type="text" name="menu_unggulan" class="form-control">
                </div>
            </div>

            <!-- 3. Jenis Tempat -->
            <div class="section">
                <h3 class="section-title">3. Jenis Tempat</h3>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label class="form-label">Bentuk Fisik</label>
                        <select name="bentuk_fisik" class="form-select">
                            <option value="Warung Kaki Lima">Warung Kaki Lima</option>
                            <option value="Kedai Rumahan">Kedai Rumahan</option>
                            <option value="Restoran">Restoran</option>
                            <option value="Gerobak Keliling">Gerobak Keliling</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status Bangunan</label>
                        <select name="status_bangunan" class="form-select">
                            <option value="Milik Sendiri">Milik Sendiri</option>
                            <option value="Sewa">Sewa</option>
                            <option value="Tempat Publik">Tempat Publik</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fasilitas</label>
                    <textarea name="fasilitas" class="form-control"></textarea>
                </div>
            </div>

            <!-- 4. Praktik K3 -->
            <div class="section">
                <h3 class="section-title">4. Praktik K3</h3>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">APD (Alat Pelindung Diri)</label>
                        <select name="apd" class="form-select">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pengelolaan Limbah</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="pengelolaan_limbah[]" value="Seasonal">
                            <label class="form-check-label">Organik</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="pengelolaan_limbah[]" value="Tetap">
                            <label class="form-check-label">Non-Organik</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Prosedur Kebersihan</label>
                    <textarea name="prosedur_kebersihan" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sumber Bahan Dasar</label>
                    <textarea name="sumber_bahan_dasar" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ventilasi</label>
                    <textarea name="ventilasi" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pelatihan K3</label>
                    <textarea name="pelatihan_k3" class="form-control"></textarea>
                </div>
            </div>

            <!-- 5. Regulasi -->
            <div class="section">
                <h3 class="section-title">5. Regulasi</h3>

                <!-- Sertifikasi -->
                <div class="mb-3">
                    <label class="form-label">Sertifikasi</label><br>
                    <label class="me-3">
                        <input type="checkbox" name="sertifikasi[]" value="PIRT"> PIRT
                    </label>
                    <label class="me-3">
                        <input type="checkbox" name="sertifikasi[]" value="BPOM"> BPOM
                    </label>
                    <label class="me-3">
                        <input type="checkbox" name="sertifikasi[]" value="Halal"> Halal
                    </label>
                    <label class="me-3">
                        <input type="checkbox" name="sertifikasi[]" value="DII"> DII
                        <input type="text" name="sertifikasi_dii" class="form-control d-inline-block ms-2"
                            style="width:150px;" placeholder="No. DII">
                    </label>
                </div>

                <!-- Kepatuhan (boolean) -->
                <div class="mb-3">
                    <label class="form-label">Kepatuhan Zonasi</label><br>
                    <textarea name="kepatuhan_zonasi" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kepatuhan Operasional</label><br>
                    <textarea name="kepatuhan_operasional" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kepatuhan Pajak</label><br>
                    <textarea name="kepatuhan_pajak" class="form-control"></textarea>
                </div>

                <!-- Program Pemerintah -->
                <div class="mb-3">
                    <label class="form-label">Program Pemerintah</label><br>
                    <label class="me-3">
                        <input type="checkbox" name="program_pemerintah[]" value="Kuliner Sehat"> Kuliner Sehat
                    </label>
                    <label class="me-3">
                        <input type="checkbox" name="program_pemerintah[]" value="UMKM Binaan"> UMKM Binaan
                    </label>
                    <label class="me-3">
                        <input type="checkbox" name="program_pemerintah[]" value="DII"> DII
                        <input type="text" name="program_dii" class="form-control d-inline-block ms-2"
                            style="width:150px;" placeholder="No. DII">
                    </label>
                </div>
            </div>


            <!-- 6. Perkiraan Pelanggan -->
            <div class="section">
                <h3 class="section-title">6. Perkiraan Pelanggan</h3>

                <!-- Rata-rata pelanggan -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Rata-rata Pelanggan per Hari/Minggu</label>
                        <input type="number" name="rata_pelanggan" class="form-control" style="max-width:250px;">
                    </div>
                </div>

                <!-- Profil pelanggan -->
                <div class="mb-3">
                    <label class="form-label">Profil Pelanggan</label><br>
                    <div class="d-flex flex-wrap">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" name="profil_pelanggan[]" value="Lokal"
                                id="lokal">
                            <label class="form-check-label" for="lokal">Lokal</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" name="profil_pelanggan[]"
                                value="Wisatawan" id="wisatawan">
                            <label class="form-check-label" for="wisatawan">Wisatawan</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" name="profil_pelanggan[]"
                                value="Pelajar / Mahasiswa" id="pelajar">
                            <label class="form-check-label" for="pelajar">Pelajar / Mahasiswa</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox" name="profil_pelanggan[]"
                                value="Pekerja" id="pekerja">
                            <label class="form-check-label" for="pekerja">Pekerja</label>
                        </div>
                    </div>
                </div>

                <!-- Jam operasional -->
                <div class="mb-3">
                    <label class="fw-bold">Jam Operasional</label>
                    <div class="row">
                        @php
                            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                        @endphp
                        @foreach ($days as $day)
                            <div class="col-md-12 mb-2">
                                <div class="d-flex align-items-center flex-wrap">
                                    <label class="me-2" style="width:80px">{{ $day }}</label>

                                    <span class="me-2">Buka</span>
                                    <input type="time" name="jam_buka[{{ $day }}]"
                                        class="form-control me-2" style="max-width:150px;">

                                    <span class="me-2">Tutup</span>
                                    <input type="time" name="jam_tutup[{{ $day }}]"
                                        class="form-control me-2" style="max-width:150px;">

                                    <div class="form-check ms-3">
                                        <input class="form-check-input tutup-check" type="checkbox"
                                            name="libur[{{ $day }}]" value="1"
                                            id="libur_{{ $day }}">
                                        <label class="form-check-label" for="libur_{{ $day }}">Libur</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Metode transaksi -->
                <div class="mb-3">
                    <label class="form-label">Metode Transaksi</label><br>
                    <div class="d-flex flex-wrap">
                        <div class="me-3">
                            <input type="checkbox" name="metode_transaksi[]" value="Tunai"> Tunai
                        </div>
                        <div class="me-3">
                            <input type="checkbox" name="metode_transaksi[]" value="Qris"> Qris
                        </div>
                        <div class="me-3">
                            <input type="checkbox" name="metode_transaksi[]" value="Online Delivery"> Online Delivery
                        </div>
                    </div>
                </div>
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


            <!-- 7. Longlat -->
            <div class="section">
                <h3 class="section-title">7. Mencatat Longlat</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control">
                    </div>
                </div>
            </div>

            <!-- 8. Foto -->
            <div class="section">
                <h3 class="section-title">8. Foto Kuliner</h3>
                <div class="mb-3">
                    <input type="file" name="foto[]" class="form-control" multiple>
                </div>
            </div>

            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>
</body>

</html>
