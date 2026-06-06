@extends('layout')

@section('content')

<h1>Új Könyv
    <a href="{{ route('books.index') }}" class="create-icon">🔙</a>
</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Könyv név</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="category_id">Kategória</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="author_id">Szerző</label>
        <select name="author_id" id="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="publisher_id">Kiadó</label>
        <select name="publisher_id" id="publisher_id">
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="series_id">Sorozat</label>
        <select name="series_id" id="series_id">
            @foreach ($series as $serie)
                <option value="{{ $serie->id }}">{{ $serie->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="release_year">Kiadás éve</label>
        <input type="number" name="release_year" id="release_year">
    </fieldset>
    <fieldset>
        <label for="description">Leírás</label>
        <textarea name="description" id="description"></textarea>
    </fieldset>
    <fieldset>
        <label for="photo">Borító URL</label>
        <input type="text" name="photo" id="photo">
    </fieldset>
    <button type="submit">Mentés</button>
</form>
@endsection