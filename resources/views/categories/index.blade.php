@extends('layout')

@section('content')
<h1>Kategóriák
    <a href="{{ route('categories.create') }}" class="create-icon">➕</a>
</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach ($categories as $category)
        <li>
        {{ $category->id }} - {{ $category->name }}
        <a href="{{ route('categories.show', $category->id) }}" class="button">👀</a>
        <a href="{{ route('categories.edit', $category->id) }}" class="button">✏️</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd ezt a kategóriát?')">🗑️</button>
        </li>
    @endforeach
</ul>
@endsection