<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = \App\Models\Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|min:2|max:255',], ['name.required' => 'A név megadása kötelező!', 'name.min' => 'A név legalább 2 karakter hosszú kell legyen!', 'name.max' => 'A név maximum 255 karakter hosszú lehet!',]
        , ["bio.required" => "A bio megadása kötelező!", "bio.min" => "A bio legalább 10 karakter hosszú kell legyen!", "bio.max" => "A bio maximum 1000 karakter hosszú lehet!",]);

        $author = new \App\Models\Author();
        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->save();

        return redirect()->route('authors.index')->with('success', 'Szerző sikeresen létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = \App\Models\Author::find($id);
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = \App\Models\Author::find($id);
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = \App\Models\Author::find($id);
        $author->name = $request->name;
        $author->save();

        return redirect()->route('authors.index')->with('success', 'Szerző sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = \App\Models\Author::find($id);
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Szerző sikeresen törölve!');
    }
}
