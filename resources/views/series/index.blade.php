@extends('layout')

@section('content')
<h1>Sorozatok
    <a href="{{ route('series.create') }}" class="create-icon">➕</a>
</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach ($series as $serie)
        <li>
        {{ $serie->id }} - {{ $serie->name }}
        <a href="{{ route('series.show', $serie->id) }}" class="button">👀</a>
        <a href="{{ route('series.edit', $serie->id) }}" class="button">✏️</a>
        <form action="{{ route('series.destroy', $serie->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd ezt a sorozatot?')">🗑️</button>
        </li>
    @endforeach
</ul>
@endsection