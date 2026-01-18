<!DOCTYPE html>
<html>
<head>
    <title>Admin - Daftar Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h3 class="mb-3">Data Wisata</h3>

    <a href="/admin/destinations/create" class="btn btn-primary mb-3">
        ➕ Tambah Destinasi
    </a>

    <table class="table table-bordered table-striped bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <!-- TAMBAHAN -->
                <th>Kategori</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($destinations as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->name }}</td>
                <td>{{ $r->location }}</td>

                <!-- TAMBAHAN KATEGORI -->
                <td>
                    <span class="badge bg-info text-dark">
                        {{ ucfirst($r->category) }}
                    </span>
                </td>

                <td>⭐ {{ number_format($r->rating,1) }}</td>
                <td>
                    <!-- CATATAN: route kamu pakai destinations, bukan restaurants -->
                    <a href="/admin/destinations/{{ $r->id }}/edit"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form method="POST"
                          action="/admin/destinations/{{ $r->id }}"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
