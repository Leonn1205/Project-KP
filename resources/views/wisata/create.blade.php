<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Tempat Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inknut Antiqua', serif;
            background: url("{{ asset('images/bg-view.png') }}") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
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
        <h2>Tambah Tempat Wisata</h2>

        <div class="form-container shadow">
            <form method="POST" action="{{ route('wisata.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nama Tempat Wisata</label>
                    <input type="text" name="nama_wisata" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kategori Tempat Wisata</label>
                    <input type="text" name="kategori_wisata" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label>Deskripsi Wisata</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label>Sejarah Wisata</label>
                    <textarea name="sejarah" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label>Narasi Wisata</label>
                    <textarea name="narasi" class="form-control" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label class="fw-bold">Jam Operasional</label>
                        <div class="row">
                            @php
                                $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                            @endphp

                            @foreach ($days as $index => $day)
                                <div class="col-md-12 mb-2">
                                    <div class="d-flex align-items-center">
                                        <label class="me-2" style="width:80px">{{ $day }}</label>

                                        <span class="me-2">Buka</span>
                                        <input type="time" name="jam_buka[{{ $day }}]"
                                            class="form-control me-2" style="max-width:150px">

                                        <span class="me-2">Tutup</span>
                                        <input type="time" name="jam_tutup[{{ $day }}]"
                                            class="form-control me-2" style="max-width:150px">

                                        <div class="form-check ms-3">
                                            <input class="form-check-input tutup-check" type="checkbox"
                                                name="libur[{{ $day }}]" value="1"
                                                id="libur_{{ $day }}">
                                            <label class="form-check-label" for="libur_{{ $day }}">
                                                Libur
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                    <div class="col-md-6 mb-3">
                        <label>Upload Foto</label>
                        <input type="file" name="foto[]" class="form-control" multiple>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
