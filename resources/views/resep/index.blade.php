
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Resep Makanan</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <h1>Katalog Resep Makanan</h1>

    <a href="{{ route('resep.create') }}">
        Tambah Resep
    </a>

    <hr>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <h2>Daftar Resep</h2>

    @forelse($reseps as $resep)

        <div>
            @if($resep->gambar)
                <img
                    src="{{ asset('storage/' . $resep->gambar) }}"
                    alt="{{ $resep->nama_resep }}"
                    width="150"
                >
            @endif

            <h3>{{ $resep->nama_resep }}</h3>

            <p>{{ $resep->deskripsi }}</p>

            <p>
                Waktu memasak:
                {{ $resep->waktu_memasak }} menit
            </p>

            <a href="{{ route('resep.show', $resep->id) }}">
                Lihat Detail
            </a>

            <a href="{{ route('resep.edit', $resep->id) }}">
                Edit
            </a>

            <form action="{{ route('resep.destroy', $resep->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button type="submit"
                    onclick="return confirm('Yakin ingin menghapus resep ini?')">
                    Hapus
                </button>

            </form>
        </div>

        <hr>

    @empty

        <p>Belum ada resep makanan.</p>

    @endforelse
<footer class="footer">
    <p>
        Dibuat oleh <strong>Damianus Kudiai</strong> - 2511011
    </p>
</footer>
</body>
</html>
