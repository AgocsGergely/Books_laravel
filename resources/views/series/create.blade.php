@extends('layout')

@section('content')

<h1>Új sorozat
    <a href="{{ route('series.index') }}" class="create-icon">🔙</a>
</h1>
@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('series.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Sorozat név</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <button type="submit">Mentés</button>
</form>
@endsection