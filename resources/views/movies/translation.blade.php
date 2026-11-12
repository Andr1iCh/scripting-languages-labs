@extends('layouts.app')
@section('title', 'Переклад фільму')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endpush
@section('content')
    <div class="movie-directory">
        <h1>Переклад «{{ $movie->title }}» ({{ $lang }})</h1>
        <form method="POST" action="{{ route('movies.translations.update', [$movie, $lang]) }}">
            @csrf
            @method('PUT')
            <div class="movie-field">
                <label for="title">Назва</label>
                <input id="title" name="title" value="{{ old('title', $translation?->title) }}" maxlength="150" required>
                @error('title') <p class="movie-error">{{ $message }}</p> @enderror
            </div>
            <div class="movie-field">
                <label for="description">Опис</label>
                <textarea id="description" name="description" rows="5" maxlength="5000">{{ old('description', $translation?->description) }}</textarea>
                @error('description') <p class="movie-error">{{ $message }}</p> @enderror
            </div>
            <button class="movie-button" type="submit">Зберегти переклад</button>
            <a href="{{ route('movies.show', ['movie' => $movie, 'lang' => $lang]) }}">Скасувати</a>
        </form>
    </div>
@endsection
