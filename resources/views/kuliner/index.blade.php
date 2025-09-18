<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Tempat Kuliner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light p-4">
    <div class="container">
        <h2 class="mb-4">Daftar Tempat Kuliner</h2>

        <div class="mb-3 d-flex justify-content-between">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
            <a href="{{ route('kuliner.create') }}" class="btn btn-success">+ Tambah Data</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Usaha</th>
                    <th>Kategori</th>
                    <th>Menu Unggulan</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kuliner as $k)
                    <tr>
                        <td>{{ $k->nama_usaha }}</td>
                        <td>{{ $k->kategori_utama }}</td>
                        <td>{{ $k->menu_unggulan }}</td>
                        <td>{{ $k->lokasi_lengkap }}</td>
                        <td>
                            <a href="{{ route('kuliner.show', $k->id_kuliner) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('kuliner.edit', $k->id_kuliner) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kuliner.destroy', $k->id_kuliner) }}" method="POST"
                                class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
