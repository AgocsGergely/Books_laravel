@extends('layout')

@section('content')

<h1>Könyv részletei
    <a href="{{ route('books.index') }}" class="create-icon">🔙</a>
</h1>
<p><strong>Név:</strong> {{ $book->name }}</p>
<p><strong>Kategória:</strong> {{ $book->category->name }}</p>
<p><strong>Kiadó:</strong> {{ $book->publisher->name }}</p>
<p><strong>Szerző:</strong> {{ $book->author->name }}</p>
<p><strong>Sorozat:</strong> {{ $book->series->name }}</p>
<p><strong>Kiadás éve:</strong> {{ $book->release_year }}</p>
<p><strong>Leírás:</strong> {{ $book->description }}</p>
<p><strong>Borító URL:</strong> {{ $book->photo }}</p>

@endsection