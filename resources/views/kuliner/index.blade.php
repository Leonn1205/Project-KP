<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Tempat Kuliner</title>
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
    </style>
</head>

<body class="bg-light p-4">
    <div class="container">
        <h2 class="mb-4">Daftar Tempat Kuliner</h2>

        <div class="mb-3 d-flex justify-content-between">
            @php $role = auth()->user()->role; @endphp
            @if ($role === 'Super Admin')
                <a href="{{ route('dashboard.superadmin') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
            @elseif ($role === 'Admin')
                <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
            @endif
            <a href="{{ route('kuliner.create') }}" class="btn btn-success">+ Tambah Data</a>
        </div>
        <a href="{{ route('export.excel', ['tipe' => 'kuliner']) }}" class="btn btn-success">Export Excel</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Usaha</th>
                    <th>Tahun Berdiri</th>
                    <th>Lokasi</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kuliner as $k)
                    <tr>
                        <td>{{ $k->nama_usaha }}</td>
                        <td>{{ $k->tahun_berdiri }}</td>
                        <td>{{ $k->lokasi_lengkap }}</td>
                        <td>{{ $k->latitude }}</td>
                        <td>{{ $k->longitude }}</td>
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
