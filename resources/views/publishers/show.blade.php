@extends('layout')

@section('content')
<h1>"{{ $publisher->name }}" kiadó részletei
    <a href="{{ route('publishers.index') }}" class="create-icon">🔙</a>
</h1>

<p><strong>Név:</strong> {{ $publisher->name }}</p>

@endsection