@extends('layout')

@section('content')

<h1>Új szerző
    <a href="{{ route('authors.index') }}" class="create-icon">🔙</a>
</h1>

@error('name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('authors.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Szerző név</label>
        <input type="text" name="name" id="name">
        
    </fieldset>
    <fieldset>
        <label for="bio">Bio</label>
        <textarea name="bio" id="bio"></textarea>
    </fieldset>
    <button type="submit">Mentés</button>
</form>
@endsection