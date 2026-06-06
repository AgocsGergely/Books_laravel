@extends('layout')

@section('content')

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror
<h1>Sorozat szerkesztése
    <a href="{{ route('series.index') }}" class="create-icon">🔙</a>
</h1>


<form action="{{ route('series.update', $serie->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Sorozat név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $serie->name) }}">
    </fieldset>
    <button type="submit">Mentés</button>
</form>

@endsection