@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<style>
    .form-box {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: sans-serif;
    }
    .form-box h2 {
        margin-top: 0;
        margin-bottom: 20px;
        font-size: 1.25rem;
    }
    .field {
        margin-bottom: 12px;
    }
    .field label {
        display: block;
        margin-bottom: 4px;
        font-weight: bold;
        font-size: 0.9rem;
    }
    .field input, .field textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .error {
        color: red;
        font-size: 0.8rem;
    }
    .btn-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
    .btn-submit {
        background: #0d6efd;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<div class="form-box">
    <h2>Tambah Buku Baru</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="field">
            <label for="title">Judul Buku *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}">
            @error('isbn') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label for="author">Penulis *</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}">
            @error('author') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label for="publisher">Penerbit</label>
            <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}">
            @error('publisher') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label for="published_year">Tahun Terbit</label>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year') }}">
            @error('published_year') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label for="price">Harga *</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}">
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label for="stock">Stok *</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}">
            @error('stock') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="field">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" rows="3">{{ old('description') }}</textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="btn-group">
            <a href="{{ route('books.index') }}">Batal</a>
            <button type="submit" class="btn-submit">Simpan</button>
        </div>
    </form>
</div>
@endsection