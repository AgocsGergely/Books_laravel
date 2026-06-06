<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = \App\Models\Series::all();
        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|min:2|max:255',], ['name.required' => 'A név megadása kötelező!', 'name.min' => 'A név legalább 2 karakter hosszú kell legyen!', 'name.max' => 'A név maximum 255 karakter hosszú lehet!',]);

        $serie = new \App\Models\Series();
        $serie->name = $request->name;
        $serie->save();

        return redirect()->route('series.index')->with('success', 'Sorozat sikeresen létrehozva!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serie = \App\Models\Series::find($id);
        return view('series.show', compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serie = \App\Models\Series::find($id);
        return view('series.edit', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required|min:2|max:255',], ['name.required' => 'A név megadása kötelező!', 'name.min' => 'A név legalább 2 karakter hosszú kell legyen!', 'name.max' => 'A név maximum 255 karakter hosszú lehet!',]);

        $serie = \App\Models\Series::find($id);
        $serie->name = $request->name;
        $serie->save();

        return redirect()->route('series.index')->with('success', 'Sorozat sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serie = \App\Models\Series::find($id);
        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Sorozat sikeresen törölve!');
    }
}
