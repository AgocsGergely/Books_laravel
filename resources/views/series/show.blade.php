@extends('layout')

@section('content')
<h1>"{{ $serie->name }}" sorozat részletei
    <a href="{{ route('series.index') }}" class="create-icon">🔙</a>
</h1>

<p><strong>Név:</strong> {{ $serie->name }}</p>

@endsection