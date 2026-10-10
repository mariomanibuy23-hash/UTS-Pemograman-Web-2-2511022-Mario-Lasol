<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;  // Added
use App\Http\Requests\UpdateBookRequest; // Added
use App\Models\Book;
use Illuminate\Http\RedirectResponse;     // Added
use Illuminate\Http\Request;
use Illuminate\View\View;
class BookController extends Controller
{
    public function index(Request $request): View
{
    $keyword = trim((string) $request->query('q', ''));

    $books = Book::query()
        ->when($keyword !== '', function ($query) use ($keyword): void {
            $query->where(function ($subQuery) use ($keyword): void {
                $subQuery
                    ->where('title', 'like', "%{$keyword}%")
                    ->orWhere('author', 'like', "%{$keyword}%")
                    ->orWhere('isbn', 'like', "%{$keyword}%");
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('books.index', compact('books', 'keyword'));
}
public function store(StoreBookRequest $request): RedirectResponse
{
    Book::create($request->validated());

    return redirect()
        ->route('books.index')
        ->with('success', 'Data buku berhasil ditambahkan.');
}

public function update(
    UpdateBookRequest $request,
    Book $book
): RedirectResponse {
    $book->update($request->validated());

    return redirect()
        ->route('books.index')
        ->with('success', 'Data buku berhasil diperbarui.');
}

public function edit(Book $book): View
{
    return view('books.edit', compact('book'));
}

public function show($id)
{
    $book = Book::findOrFail($id);
    return view('books.show', compact('book'));
}

public function create()
{
    return view('books.create');
}

public function destroy(Book $book): RedirectResponse
{
    $book->delete();

    return redirect()
        ->route('books.index')
        ->with('success', 'Data buku berhasil dihapus.');
}


}