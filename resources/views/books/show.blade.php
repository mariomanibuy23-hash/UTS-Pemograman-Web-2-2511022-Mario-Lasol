@extends('layouts.app')

@section('title', 'Detail Buku - ' . $book->title)

@section('content')
    <h1>{{ $book->title }}</h1>

    <dl>
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

    <a href="{{ route('books.index') }}">Kembali</a>
@endsection