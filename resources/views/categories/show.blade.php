@extends('layout')

@section('content')
<h1>"{{ $category->name }}" kategória részletei
    <a href="{{ route('categories.index') }}" class="create-icon">🔙</a>
</h1>

<p><strong>Név:</strong> {{ $category->name }}</p>

@endsection