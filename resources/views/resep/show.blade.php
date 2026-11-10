
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Resep</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <h1>Detail Resep Makanan</h1>

    <a href="{{ route('resep.index') }}">
        Kembali ke Katalog
    </a>

    <hr>

    <h2>{{ $resep->nama_resep }}</h2>

    @if($resep->gambar)
        <img
            src="{{ asset('storage/' . $resep->gambar) }}"
            alt="{{ $resep->nama_resep }}"
            width="300"
        >
    @endif

    <h3>Deskripsi</h3>
    <p>{{ $resep->deskripsi }}</p>

    <h3>Waktu Memasak</h3>
    <p>{{ $resep->waktu_memasak }} menit</p>

    <h3>Bahan-Bahan</h3>
    <p style="white-space: pre-line">{{ $resep->bahan }}</p>

    <h3>Langkah-Langkah Memasak</h3>
    <p style="white-space: pre-line">{{ $resep->langkah }}</p>

    <hr>

    <a href="{{ route('resep.edit', $resep->id) }}">
        Edit Resep
    </a>
<footer class="footer">
    <p>
        Dibuat oleh <strong>Damianus Kudiai</strong> - 2511011
    </p>
</footer>
</body>
</html>
