@extends('layout')

@section('content')

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<h1>Kiadó szerkesztése
    <a href="{{ route('publishers.index') }}" class="create-icon">🔙</a>
</h1>

<form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Kiadó neve</label>
        <input type="text" name="name" id="name" value="{{ old('name', $publisher->name) }}">
    </fieldset>
    <button type="submit">Mentés</button>
</form>

@endsection