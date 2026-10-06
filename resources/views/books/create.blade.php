@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h1>Tambah Buku</h1>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <!-- 1. Judul (Title) -->
        <div>
            <label for="title">Judul Buku *</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
            >
            @error('title')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <!-- 2. ISBN -->
        <div>
            <label for="isbn">ISBN</label>
            <input
                type="text"
                id="isbn"
                name="isbn"
                value="{{ old('isbn') }}"
            >
            @error('isbn')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <!-- 3. Penulis (Author) -->
        <div>
            <label for="author">Penulis *</label>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author') }}"
            >
            @error('author')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <!-- 4. Penerbit (Publisher) -->
        <div>
            <label for="publisher">Penerbit</label>
            <input
                type="text"
                id="publisher"
                name="publisher"
                value="{{ old('publisher') }}"
            >
            @error('publisher')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <!-- 5. Tahun Terbit (Published Year) -->
        <div>
            <label for="published_year">Tahun Terbit</label>
            <input
                type="number"
                id="published_year"
                name="published_year"
                value="{{ old('published_year') }}"
            >
            @error('published_year')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <!-- 6. Harga (Price) -->
        <div>
            <label for="price">Harga *</label>
            <input
                type="number"
                step="0.01"
                id="price"
                name="price"
                value="{{ old('price') }}"
            >
            @error('price')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <!-- 7. Stok (Stock) -->
        <div>
            <label for="stock">Stok *</label>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock') }}"
            >
            @error('stock')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <!-- 8. Deskripsi (Description) -->
        <div>
            <label for="description">Deskripsi</label>
            <textarea
                id="description"
                name="description"
            >{{ old('description') }}</textarea>
            @error('description')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection