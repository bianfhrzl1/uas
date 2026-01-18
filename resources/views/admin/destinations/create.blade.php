<!DOCTYPE html>
<html>
<head>
    <title>Tambah Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
<h3>Tambah Destinasi</h3>

<form method="POST" enctype="multipart/form-data" action="/admin/destinations">
    
    @csrf
    <input class="form-control mb-2" name="name" placeholder="Nama Destinasi">
    <input class="form-control mb-2" name="location" placeholder="Lokasi">

    <!-- TAMBAHAN KATEGORI -->
    <div class="mb-2">
        <label class="form-label">Kategori</label>
        <select name="category" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="alam">Alam</option>
            <option value="budaya">Budaya</option>
            <option value="pantai">Pantai</option>
        </select>
    </div>
    <!-- AKHIR TAMBAHAN -->

    <textarea class="form-control mb-2" name="description" placeholder="Deskripsi"></textarea>
    <input type="file" class="form-control mb-2" name="image">
    <button class="btn btn-primary">Simpan</button>
</form>
</body>
</html>
