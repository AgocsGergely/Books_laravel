@extends('layout')

@section('content')

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<h1>Szerző szerkesztése
    <a href="{{ route('authors.index') }}" class="create-icon">🔙</a>
</h1>

<form action="{{ route('authors.update', $author->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Szerző név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}">
    </fieldset>
    <fieldset>
        <label for="bio">Bio</label>
        <textarea name="bio" id="bio">{{ old('bio', $author->bio) }}</textarea>
    </fieldset>
    <button type="submit">Mentés</button>
</form>

@endsection