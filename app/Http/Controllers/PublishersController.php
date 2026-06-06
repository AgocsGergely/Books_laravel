<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = \App\Models\Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|min:2|max:255',], ['name.required' => 'A név megadása kötelező!', 'name.min' => 'A név legalább 2 karakter hosszú kell legyen!', 'name.max' => 'A név maximum 255 karakter hosszú lehet!',]);

        $publisher = new \App\Models\Publisher();
        $publisher->name = $request->name;
        $publisher->save();

        return redirect()->route('publishers.index')->with('success', 'Kiadó sikeresen létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publisher = \App\Models\Publisher::find($id);
        return view('publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publisher = \App\Models\Publisher::find($id);
        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required|min:2|max:255',], ['name.required' => 'A név megadása kötelező!', 'name.min' => 'A név legalább 2 karakter hosszú kell legyen!', 'name.max' => 'A név maximum 255 karakter hosszú lehet!',]);

        $publisher = \App\Models\Publisher::find($id);
        $publisher->name = $request->name;
        $publisher->save();

        return redirect()->route('publishers.index')->with('success', 'Kiadó sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publisher = \App\Models\Publisher::find($id);
        $publisher->delete();

        return redirect()->route('publishers.index')->with('success', 'Kiadó sikeresen törölve!');
    }
}
