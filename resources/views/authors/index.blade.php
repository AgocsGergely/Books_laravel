@extends('layout')

@section('content')
<h1>Szerzők
    <a href="{{ route('authors.create') }}" class="create-icon">➕</a>
</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach ($authors as $author)
        <li>
        {{ $author->id }} - {{ $author->name }}
        <a href="{{ route('authors.show', $author->id) }}" class="button">👀</a>
        <a href="{{ route('authors.edit', $author->id) }}" class="button">✏️</a>
        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd ezt a szerzőt?')">🗑️</button>
        </li>
    @endforeach
</ul>
@endsection