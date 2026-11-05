@extends('layouts.app')
@section('title', $blog->title)
@section('content')
    <h1>{{ $blog->title }}</h1>
    <p><strong>Категорія:</strong> {{ $blog->category?->category_name ?? 'Без категорії' }}</p>
    <p><strong>Автор:</strong> {{ $blog->author?->name ?? 'Редакція' }}</p>
    <p><strong>Дата публікації:</strong> {{ $blog->dt_created->format('d.m.Y') }}</p>
    <div style="white-space: pre-wrap">{{ $blog->text }}</div>

    <p><a href="{{ route('blog.edit', $blog) }}">Редагувати</a></p>
    <p><a href="{{ route('blog.create') }}">Додати запис</a></p>
    <form method="POST" action="{{ route('blog.destroy', $blog) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Видалити</button>
    </form>
@endsection
