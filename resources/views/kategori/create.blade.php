<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori Wisata</title>
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
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            max-width: 600px;
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
        <h2>Tambah Kategori Wisata</h2>

        <div class="form-container shadow">
            <form method="POST" action="{{ route('kategori-wisata.store') }}">
                @csrf
                <div class="mb-3">
                    <label>Nama Kategori Wisata</label>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Contoh: Pantai, Sejarah, Kuliner" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('kategori-wisata.index') }}" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
