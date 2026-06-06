<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        $publishers = \App\Models\Publisher::all();
        $authors = \App\Models\Author::all();
        $series = \App\Models\Series::all();
        return view('books.create', compact('categories', 'publishers', 'authors', 'series'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|min:2|max:255', 'category_id' => 'required|exists:Category,id',], ['name.required' => 'A név megadása kötelező!', 'name.min' => 'A név legalább 2 karakter hosszú kell legyen!', 'name.max' => 'A név maximum 255 karakter hosszú lehet!', 'category_id.required' => 'A kategória megadása kötelező!', 'category_id.exists' => 'A kiválasztott kategória nem létezik!',]);

        Book::create($request->all());
        
        return redirect()->route('books.index')->with('success', 'Könyv sikeresen létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $categories = \App\Models\Category::all();
        $publishers = \App\Models\Publisher::all();
        $authors = \App\Models\Author::all();
        $series = \App\Models\Series::all();
        return view('books.edit', compact('book', 'categories', 'publishers', 'authors', 'series'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required|min:2|max:255', 'category_id' => 'required|exists:Category,id',], ['name.required' => 'A név megadása kötelező!', 'name.min' => 'A név legalább 2 karakter hosszú kell legyen!', 'name.max' => 'A név maximum 255 karakter hosszú lehet!', 'category_id.required' => 'A kategória megadása kötelező!', 'category_id.exists' => 'A kiválasztott kategória nem létezik!',]);

            $book = Book::find($id);
            $book->update($request->all());
            return redirect()->route('books.index')->with('success', 'Könyv sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Könyv sikeresen törölve!');
    }
}
