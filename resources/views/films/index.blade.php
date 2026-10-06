<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background-color: #fff; margin-bottom: 20px; }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        nav { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
        nav a { text-decoration: none; color: #007bff; padding: 5px 10px; border: 1px solid #007bff; border-radius: 4px; }
        nav span { color: #555; }
    </style>
</head>
<body>

    <!-- Navigasi Paginasi (Atas) -->
    @if ($films->hasPages())
        <nav>
            @if ($films->onFirstPage())
                <span>Sebelumnya</span>
            @else
                <a href="{{ $films->previousPageUrl() }}">Sebelumnya</a>
            @endif

            <span>
                Halaman {{ $films->currentPage() }} dari {{ $films->lastPage() }}
            </span>

            @if ($films->hasMorePages())
                <a href="{{ $films->nextPageUrl() }}">Berikutnya</a>
            @endif
        </nav>
    @endif

    <h1>Data Film</h1>

    <!-- Tabel Data Film -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Sutradara</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($films as $film)
                <tr>
                    <td>{{ $films->firstItem() + $loop->index }}</td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->director }}</td>
                    <td>{{ $film->published_year }}</td>
                    <td>
                        <a href="{{ route('films.show', $film) }}">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Data film belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>