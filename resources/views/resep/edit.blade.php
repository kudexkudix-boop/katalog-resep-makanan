
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <h1>Edit Resep Makanan</h1>

    <a href="{{ route('resep.index') }}">
        Kembali
    </a>

    <hr>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('resep.update', $resep->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label>Nama Resep</label><br>
        <input type="text"
               name="nama_resep"
               value="{{ old('nama_resep', $resep->nama_resep) }}"
               required>

        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi"
                  rows="4"
                  required>{{ old('deskripsi', $resep->deskripsi) }}</textarea>

        <br><br>

        <label>Bahan-Bahan</label><br>
        <textarea name="bahan"
                  rows="6"
                  required>{{ old('bahan', $resep->bahan) }}</textarea>

        <br><br>

        <label>Langkah-Langkah Memasak</label><br>
        <textarea name="langkah"
                  rows="8"
                  required>{{ old('langkah', $resep->langkah) }}</textarea>

        <br><br>

        <label>Waktu Memasak (Menit)</label><br>
        <input type="number"
               name="waktu_memasak"
               value="{{ old('waktu_memasak', $resep->waktu_memasak) }}"
               min="1"
               required>

        <br><br>

        <label>Gambar Makanan</label><br>

        @if($resep->gambar)
            <img
                src="{{ asset('storage/' . $resep->gambar) }}"
                width="150"
                alt="Gambar resep saat ini">

            <br>
        @endif

        <input type="file"
               name="gambar"
               accept="image/jpeg,image/png,image/jpg">

        <br><br>

        <button type="submit">
            Update Resep
        </button>

    </form>
<footer class="footer">
    <p>
        Dibuat oleh <strong>Damianus Kudiai</strong> - 2511011
    </p>
</footer>
</body>
</html>
