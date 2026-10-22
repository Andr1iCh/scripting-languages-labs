@extends('layouts.app')
@section('title', 'Редагування фільму')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endpush

@section('content')
    <div class="movie-directory">
        <h1>Редагування фільму</h1>
        <form method="POST" action="{{ route('movies.update', $movie) }}" novalidate>
            @csrf
            @method('PUT')
            @include('movies._form')
            <button class="movie-button" type="submit">Зберегти зміни</button>
        </form>
        <p><a href="{{ route('movies.show', $movie) }}">Скасувати</a></p>
        <p><a href="{{ route('movies.index') }}">Повернутися до списку</a></p>
    </div>
@endsection
