
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Resep</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <h1>Tambah Resep Makanan</h1>

    <a href="{{ route('resep.index') }}">Kembali</a>

    <hr>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('resep.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <label>Nama Resep</label><br>
        <input type="text"
               name="nama_resep"
               value="{{ old('nama_resep') }}"
               required>

        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi"
                  rows="4"
                  required>{{ old('deskripsi') }}</textarea>

        <br><br>

        <label>Bahan-Bahan</label><br>
        <textarea name="bahan"
                  rows="6"
                  required>{{ old('bahan') }}</textarea>

        <br><br>

        <label>Langkah-Langkah Memasak</label><br>
        <textarea name="langkah"
                  rows="8"
                  required>{{ old('langkah') }}</textarea>

        <br><br>

        <label>Waktu Memasak (Menit)</label><br>
        <input type="number"
               name="waktu_memasak"
               value="{{ old('waktu_memasak') }}"
               min="1"
               required>

        <br><br>

        <label>Gambar Makanan</label><br>
        <input type="file"
               name="gambar"
               accept="image/jpeg,image/png,image/jpg">

        <br><br>

        <button type="submit">
            Simpan Resep
        </button>

    </form>
<footer class="footer">
    <p>
        Dibuat oleh <strong>Damianus Kudiai</strong> - 2511011
    </p>
</footer>
</body>
</html>
