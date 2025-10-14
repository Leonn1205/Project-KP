<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Tempat Wisata</title>
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

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Daftar Tempat Wisata</h2>

        <div class="mb-3 d-flex justify-content-between">
            @php $role = auth()->user()->role; @endphp
            @if ($role === 'Super Admin')
                <a href="{{ route('dashboard.superadmin') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
            @elseif ($role === 'Admin')
                <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
            @endif
            <a href="{{ route('wisata.create') }}" class="btn btn-success">+ Tambah Wisata</a>
        </div>

        <!-- Alert jika sukses -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('export.excel', ['tipe' => 'wisata']) }}" class="btn btn-success">Export Wisata</a>

        <!-- Tabel -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Kategori</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($wisata as $index => $w)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $w->nama_wisata }}</td>
                        <td>{{ $w->kategori->nama_kategori }}</td>
                        <td>{{ $w->latitude }}</td>
                        <td>{{ $w->longitude }}</td>
                        <td>
                            <a href="{{ route('wisata.edit', $w->id_wisata) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('wisata.destroy', $w->id_wisata) }}" method="POST"
                                class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
