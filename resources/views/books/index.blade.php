@extends('layout')

@section('content')
<h1>Könyvek
    <a href="{{ route('books.create') }}" class="create-icon">➕</a>
</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach ($books as $book)
        <li>
        {{ $book->id }} - {{ $book->name }} - {{ $book->category->name }}
        <a href="{{ route('books.show', $book->id) }}" class="button">👀</a>
        <a href="{{ route('books.edit', $book->id) }}" class="button">✏️</a>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd ezt a könyvet?')">🗑️</button>
        </li>
    @endforeach
</ul>
@endsection