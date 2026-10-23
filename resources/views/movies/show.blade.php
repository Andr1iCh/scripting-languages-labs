@extends('layouts.app')
@section('title', $movie->title)
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endpush

@section('content')
    <div class="movie-directory">
        <h1>{{ $movie->title }}</h1>
        <p><strong>Жанр:</strong> {{ $movie->genre }}</p>
        <p><strong>Режисер:</strong> {{ $movie->director }}</p>
        <p><strong>Рік виходу:</strong> {{ $movie->release_year }}</p>
        <p><strong>Тривалість:</strong> {{ $movie->duration }} хв</p>
        <p><strong>Короткий опис:</strong></p>
        <p class="movie-description">{{ $movie->description ?? 'Опис ще не додано.' }}</p>

        <p><a class="movie-button" href="{{ route('movies.edit', $movie) }}">Редагувати</a></p>

        <form method="POST" action="{{ route('movies.destroy', $movie) }}">
            @csrf
            @method('DELETE')
            <button class="movie-button movie-delete" type="submit">Видалити фільм</button>
        </form>

        <p><a href="{{ route('movies.index') }}">Повернутися до списку</a></p>
    </div>
@endsection
