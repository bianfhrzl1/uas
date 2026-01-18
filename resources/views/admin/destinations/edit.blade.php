<!DOCTYPE html>
<html>
<head>
    <title>Edit Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<h3>Edit Destinasi</h3>

<form method="POST" enctype="multipart/form-data" action="/admin/destinations/{{ $destination->id }}">
    @csrf
    @method('PUT')

    <input class="form-control mb-2" name="name" value="{{ $destination->name }}">
    <input class="form-control mb-2" name="location" value="{{ $destination->location }}">

    <!-- TAMBAHAN KATEGORI -->
    <div class="mb-2">
        <label class="form-label">Kategori</label>
        <select name="category" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="alam" {{ $destination->category == 'alam' ? 'selected' : '' }}>Alam</option>
            <option value="budaya" {{ $destination->category == 'budaya' ? 'selected' : '' }}>Budaya</option>
            <option value="pantai" {{ $destination->category == 'pantai' ? 'selected' : '' }}>Pantai</option>
        </select>
    </div>
    <!-- AKHIR TAMBAHAN -->

    <textarea class="form-control mb-2" name="description">{{ $destination->description }}</textarea>

    @if($destination->image)
        <img src="{{ asset('storage/'.$destination->image) }}" width="120" class="mb-2"><br>
    @endif

    <input type="file" class="form-control mb-2" name="image">
    <button class="btn btn-success">Update</button>
</form>
</body>
</html>
