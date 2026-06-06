@extends('layout')

@section('content')
<h1>"{{ $author->name }}" szerző részletei
    <a href="{{ route('authors.index') }}" class="create-icon">🔙</a>
</h1>

<p><strong>Név:</strong> {{ $author->name }}</p>
<p><strong>Bio:</strong> {{ $author->bio }}</p>

@endsection