<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|min:2|max:255',], ['name.required' => 'A név megadása kötelező!', 'name.min' => 'A név legalább 2 karakter hosszú kell legyen!', 'name.max' => 'A név maximum 255 karakter hosszú lehet!',]);

        $category = new \App\Models\Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen létrehozva!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = \App\Models\Category::find($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = \App\Models\Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required|min:2|max:255',], ['name.required' => 'A név megadása kötelező!', 'name.min' => 'A név legalább 2 karakter hosszú kell legyen!', 'name.max' => 'A név maximum 255 karakter hosszú lehet!',]);

        $category = \App\Models\Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = \App\Models\Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen törölve!');
    }
}
