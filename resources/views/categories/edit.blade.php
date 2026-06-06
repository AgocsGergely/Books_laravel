@extends('layout')

@section('content')

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror
<h1>Kategória szerkesztése
    <a href="{{ route('categories.index') }}" class="create-icon">🔙</a>
</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Kategória név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
    </fieldset>
    <button type="submit">Mentés</button>
</form>

@endsection