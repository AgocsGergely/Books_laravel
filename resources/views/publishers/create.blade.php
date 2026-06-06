@extends('layout')

@section('content')

<h1>Új kiadó
    <a href="{{ route('publishers.index') }}" class="create-icon">🔙</a>
</h1>
@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('publishers.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Kiadó neve</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <button type="submit">Mentés</button>
</form>
@endsection