@extends('layouts.app')
@section('title', $translation?->title ?? $movie->title)
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endpush

@section('content')
    <div class="movie-directory">
        <h1>{{ $translation?->title ?? $movie->title }}</h1>
        <form class="movie-filter" method="GET" action="{{ route('movies.show', $movie) }}">
            @include('movies._language')
            <button class="movie-button" type="submit">Показати</button>
        </form>
        <p><strong>Жанр:</strong> {{ $movie->genre }}</p>
        <p><strong>Режисер:</strong> {{ $movie->director }}</p>
        <p><strong>Рік виходу:</strong> {{ $movie->release_year }}</p>
        <p><strong>Тривалість:</strong> {{ $movie->duration }} хв</p>
        <p><strong>Короткий опис:</strong></p>
        <p class="movie-description">{{ $translation?->description ?? $movie->description ?? 'Опис ще не додано.' }}</p>

        <p><strong>Актори:</strong></p>
        <ul>
            @forelse ($movie->actors as $actor)
                <li>{{ $actor->name }}</li>
            @empty
                <li>Акторів не вказано.</li>
            @endforelse
        </ul>

        @if ($lang !== 'uk')
            <p><a href="{{ route('movies.translations.edit', [$movie, $lang]) }}">
                {{ $translation ? 'Редагувати переклад' : 'Додати переклад' }} ({{ $lang }})
            </a></p>
        @endif

        <p><a class="movie-button" href="{{ route('movies.edit', $movie) }}">Редагувати</a></p>

        <form method="POST" action="{{ route('movies.destroy', $movie) }}">
            @csrf
            @method('DELETE')
            <button class="movie-button movie-delete" type="submit">Видалити фільм</button>
        </form>

        <p><a href="{{ route('movies.index', ['lang' => $lang]) }}">Повернутися до списку</a></p>
    </div>
@endsection
