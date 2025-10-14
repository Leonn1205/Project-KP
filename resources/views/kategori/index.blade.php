<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inknut Antiqua', serif;
            background: url("{{ asset('images/bg-view.png') }}") no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-light p-4">
    <div class="container py-5">
        <h2 class="mb-4 text-center">Daftar Kategori Wisata</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <!-- Header card untuk tombol -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        @php $role = auth()->user()->role; @endphp
                        @if ($role === 'Super Admin')
                            <a href="{{ route('dashboard.superadmin') }}" class="btn btn-secondary">← Kembali ke
                                Dashboard</a>
                        @elseif ($role === 'Admin')
                            <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">← Kembali ke
                                Dashboard</a>
                        @endif
                        <a href="{{ route('kategori-wisata.create') }}" class="btn btn-success btn-sm">+ Tambah</a>
                    </div>

                    <!-- Isi card untuk tabel -->
                    <div class="card-body p-0">
                        <table class="table table-sm table-bordered table-striped mb-0 text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:70%">Nama Kategori</th>
                                    <th style="width:30%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $kat)
                                    <tr>
                                        <td>{{ $kat->nama_kategori }}</td>
                                        <td>
                                            <form action="{{ route('kategori-wisata.destroy', $kat->id_kategori) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Yakin hapus kategori ini?')"
                                                    class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Belum ada kategori.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
