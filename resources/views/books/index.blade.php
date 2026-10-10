<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        nav {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        nav a {
            text-decoration: none;
            color: #007bff;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
        }
        nav a:hover {
            background-color: #007bff;
            color: #fff;
        }
        nav span {
            color: #555;
        }

        /* CSS Tambahan untuk Form Pencarian */
        .search-form {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .search-form input[type="search"] {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 300px;
            font-size: 14px;
        }
        .search-form button {
            padding: 8px 16px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .search-form button:hover {
            background-color: #218838;
        }
        .search-form a {
            padding: 8px 16px;
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .search-form a:hover {
            background-color: #5a6268;
        }
        
        /* CSS untuk tata letak tombol Aksi */
        .action-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-detail {
            text-decoration: none;
            color: #007bff;
            padding: 6px 12px;
            border: 1px solid #007bff;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn-detail:hover {
            background-color: #007bff;
            color: #fff;
        }
        .btn-edit {
            text-decoration: none;
            color: #ffc107;
            padding: 6px 12px;
            border: 1px solid #ffc107;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn-edit:hover {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-delete:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>

    <!-- Navigasi Halaman (Atas) -->
    @if ($books->hasPages())
        <nav>
            @if ($books->onFirstPage())
                <span>Sebelumnya</span>
            @else
                <a href="{{ $books->previousPageUrl() }}">Sebelumnya</a>
            @endif

            <span>
                Halaman {{ $books->currentPage() }} dari {{ $books->lastPage() }}
            </span>

            @if ($books->hasMorePages())
                <a href="{{ $books->nextPageUrl() }}">Berikutnya</a>
            @else
                <span>Berikutnya</span>
            @endif
        </nav>
    @endif

    <h1>Data Buku</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('books.index') }}" class="search-form">
        <input
            type="search"
            name="q"
            value="{{ $keyword }}"
            placeholder="Cari judul, penulis, atau ISBN"
        >
        <button type="submit">Cari</button>
        <a href="{{ route('books.index') }}">Reset</a>
    </form>
    <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('books.create') }}" class="btn btn-primary">
        + Tambah Buku Baru
    </a>
</div>

    <!-- Tabel Data Buku -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $books->firstItem() + $loop->index }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <div class="action-group">
                            <!-- Tombol Detail -->
                            <a href="{{ route('books.show', $book->id) }}" class="btn-detail">Detail</a>
                            
                            <!-- Tombol Edit -->
                            <a href="{{ route('books.edit', $book->id) }}" class="btn-edit">Edit</a>
                            
                            <!-- Form & Tombol Hapus -->
                            <form method="POST" action="{{ route('books.destroy', $book->id) }}" onsubmit="return confirm('Hapus data buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Data belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>