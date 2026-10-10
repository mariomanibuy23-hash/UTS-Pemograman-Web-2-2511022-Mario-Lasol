@extends('layouts.app')

@section('title', 'Detail Buku - ' . $book->title)

@section('content')
<style>
    /* Container Utama */
    .book-detail-container {
        max-width: 700px;
        margin: 40px auto;
        padding: 0 15px;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    /* Card Wrapper */
    .book-card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    /* Card Header */
    .book-card-header {
        background-color: #0d6efd;
        color: #ffffff;
        padding: 15px 20px;
    }

    .book-card-header h2 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
    }

    /* Card Body */
    .book-card-body {
        padding: 25px 20px;
    }

    .book-title {
        margin-top: 0;
        margin-bottom: 20px;
        font-size: 1.75rem;
        color: #212529;
    }

    /* Grid Layout untuk Detail */
    .book-details {
        display: grid;
        grid-template-columns: 140px 1fr;
        row-gap: 12px;
        column-gap: 15px;
        margin: 0 0 25px 0;
    }

    .book-details dt {
        font-weight: 600;
        color: #495057;
    }

    .book-details dd {
        margin: 0;
        color: #212529;
        word-break: break-word;
    }

    /* Tombol Kembali */
    .btn-back {
        display: inline-block;
        padding: 8px 18px;
        background-color: #6c757d;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 0.95rem;
        transition: background-color 0.2s ease;
    }

    .btn-back:hover {
        background-color: #5c636a;
        color: #ffffff;
    }

    /* Responsif Layar Kecil (HP) */
    @media (max-width: 576px) {
        .book-details {
            grid-template-columns: 1fr;
            row-gap: 4px;
        }

        .book-details dt {
            margin-top: 10px;
        }
    }
</style>
<div class="book-detail-container">
    <div class="book-card">
        <div class="book-card-header">
            <h2>Detail Buku</h2>
        </div>
        <div class="book-card-body">
            <h1 class="book-title">{{ $book->title }}</h1>

            <dl class="book-details">
                <dt>ISBN</dt>
                <dd>{{ $book->isbn ?: '-' }}</dd>

                <dt>Penulis</dt>
                <dd>{{ $book->author }}</dd>

                <dt>Penerbit</dt>
                <dd>{{ $book->publisher ?: '-' }}</dd>

                <dt>Tahun Terbit</dt>
                <dd>{{ $book->published_year ?: '-' }}</dd>

                <dt>Harga</dt>
                <dd>Rp {{ number_format((float) $book->price, 0, ',', '.') }}</dd>

                <dt>Stok</dt>
                <dd>{{ $book->stock }}</dd>

                <dt>Deskripsi</dt>
                <dd>{{ $book->description ?: '-' }}</dd>
            </dl>

            <a href="{{ route('books.index') }}" class="btn-back">&larr; Kembali</a>
        </div>
    </div>
</div>
@endsection