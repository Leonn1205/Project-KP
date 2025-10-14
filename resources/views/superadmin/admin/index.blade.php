<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inknut Antiqua', serif;
            background: url("{{ asset('images/bg-view.png') }}") no-repeat center center fixed;
            background-size: cover;
        }

        h2 {
            margin-top: 50px;
            text-align: center;
            font-weight: bold;
        }

        .table {
            max-width: 900px;
            margin: 30px auto;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn-group-top {
            max-width: 900px;
            margin: 0 auto 15px auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .alert {
            max-width: 900px;
            margin: 0 auto 15px auto;
        }
    </style>
</head>

<body>

    <h2>Manajemen Admin</h2>

    <div class="btn-group-top">
        <a href="{{ route('dashboard.superadmin') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
        <a href="{{ route('superadmin.admin.create') }}" class="btn btn-success">+ Tambah Admin</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admins as $index => $admin)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->role }}</td>
                    <td>
                        <a href="{{ route('superadmin.admin.edit', $admin->id_user) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('superadmin.admin.delete', $admin->id_user) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus admin ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada admin.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
