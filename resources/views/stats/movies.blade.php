@extends('layouts.app')
@section('title', 'Популярність фільмів')
@section('main-class', 'stats')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/stats.css') }}">
@endpush
@section('content')
    <h1>Популярність фільмів</h1>
    <p><a href="{{ route('stats.pages') }}">Статистика відвідувань</a></p>
    <table>
        <thead>
            <tr>
                <th>Фільм</th>
                <th>Жанр</th>
                <th>Переглядів</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td><a href="{{ route('movies.show', $movie) }}">{{ $movie->title }}</a></td>
                    <td>{{ $movie->genre }}</td>
                    <td>{{ $movie->views }}</td>
                </tr>
            @empty
                <tr><td colspan="3">Фільмів ще немає.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $movies->links('stats.pagination') }}
@endsection
