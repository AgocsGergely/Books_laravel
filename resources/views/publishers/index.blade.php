@extends('layout')

@section('content')
<h1>Kiadók
    <a href="{{ route('publishers.create') }}" class="create-icon">➕</a>
</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach ($publishers as $publisher)
        <li>
        {{ $publisher->id }} - {{ $publisher->name }}
        <a href="{{ route('publishers.show', $publisher->id) }}" class="button">👀</a>
        <a href="{{ route('publishers.edit', $publisher->id) }}" class="button">✏️</a>
        <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd ezt a kiadót?')">🗑️</button>
        </li>
    @endforeach
</ul>
@endsection