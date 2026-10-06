<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Film - {{ $film->title }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; }
        .card { background-color: #fff; padding: 20px; border-radius: 8px; border: 1px solid #ddd; max-width: 600px; }
        h1 { margin-top: 0; color: #333; }
        p { line-height: 1.6; }
        a { text-decoration: none; color: #007bff; display: inline-block; margin-top: 15px; }
    </style>
</head>
<body>

    <div class="card">
        <h1>{{ $film->title }}</h1>
        <p><strong>Sutradara:</strong> {{ $film->director }}</p>
        <p><strong>Tahun Rilis:</strong> {{ $film->published_year }}</p>
        <p><strong>Deskripsi:</strong></p>
        <p>{{ $film->description ?? 'Tidak ada deskripsi tersedia.' }}</p>

        <a href="{{ route('films.index') }}">&larr; Kembali ke Daftar Film</a>
    </div>

</body>
</html>