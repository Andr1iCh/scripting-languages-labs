@extends('layouts.app')
@section('title', 'Додати фільм')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endpush

@section('content')
    <div class="movie-directory">
        <h1>Додати фільм</h1>
        <form method="POST" action="{{ route('movies.store') }}" novalidate>
            @csrf
            @include('movies._form')
            <button class="movie-button" type="submit">Зберегти</button>
        </form>
        <p><a href="{{ route('movies.index') }}">Повернутися до списку</a></p>
    </div>
@endsection
