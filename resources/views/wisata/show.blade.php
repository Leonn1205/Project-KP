<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Tempat Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2f5233;
            font-weight: bold;
        }
        h6 {
            margin-top: 20px;
            color: #0d3059;
            font-weight: 600;
        }
        .btn-back {
            margin-top: 20px;
            background: #0d3059;
            color: #fff;
        }
        .btn-back:hover {
            background: #15477a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>{{ $wisata->nama_wisata }}</h2>
        <p><b>Kategori:</b> {{ $wisata->kategori_wisata }}</p>
        <p>{{ $wisata->deskripsi ?? 'Belum ada deskripsi.' }}</p>

        <h6>Jam Operasional</h6>
        <ul>
            @forelse($wisata->jamOperasional as $jam)
                <li>{{ $jam->hari }} :
                    {{ $jam->jam_buka ?? 'Libur' }} - {{ $jam->jam_tutup ?? 'Libur' }}
                </li>
            @empty
                <li>Belum ada data jam operasional</li>
            @endforelse
        </ul>

        <h6>Foto</h6>
        <div class="row">
            @forelse($wisata->foto as $f)
                <div class="col-md-4 mb-3">
                    <img src="{{ asset('storage/'.$f->path_foto) }}" class="img-fluid rounded shadow-sm">
                </div>
            @empty
                <p>Belum ada foto untuk tempat wisata ini.</p>
            @endforelse
        </div>

        <a href="{{ route('wisata.index') }}" class="btn btn-back">← Kembali ke Daftar</a>
    </div>
</body>
</html>
