@extends('layout')

@section('content')

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<h1>Könyv szerkesztése
    <a href="{{ route('books.index') }}" class="create-icon">🔙</a>
</h1>

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Könyv név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $book->name) }}">
    </fieldset>
    <fieldset>
        <label for="category_id">Kategória</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="author_id">Szerző</label>
        <select name="author_id" id="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="publisher_id">Kiadó</label>
        <select name="publisher_id" id="publisher_id">
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}" {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="series_id">Sorozat</label>
        <select name="series_id" id="series_id">
            @foreach ($series as $serie)
                <option value="{{ $serie->id }}" {{ $book->series_id == $serie->id ? 'selected' : '' }}>{{ $serie->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="release_year">Kiadás éve</label>
        <input type="number" name="release_year" id="release_year" value="{{ old('release_year', $book->release_year) }}">
    </fieldset>
    <fieldset>
        <label for="description">Leírás</label>
        <textarea name="description" id="description">{{ old('description', $book->description) }}</textarea>
    </fieldset>
    <fieldset>
        <label for="photo">Borító URL</label>
        <input type="text" name="photo" id="photo" value="{{ old('photo', $book->photo) }}">
    </fieldset>
    <button type="submit">Mentés</button>
</form>

@endsection