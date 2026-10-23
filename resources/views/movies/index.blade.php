@extends('layouts.app')
@section('title', 'Фільми')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endpush

@section('content')
    <div class="movie-directory">
        <h1>Фільми</h1>

        @if (session('success'))
            <p class="movie-success" role="status">{{ session('success') }}</p>
        @endif

        <p><a class="movie-button" href="{{ route('movies.create') }}">Додати фільм</a></p>

        <form class="movie-filter" method="GET" action="{{ route('movies.index') }}">
            <div>
                <label for="genre">Жанр</label>
                <select id="genre" name="genre">
                    <option value="">Усі жанри</option>
                    @foreach ($genres as $item)
                        <option value="{{ $item }}" @selected($genre === $item)>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <button class="movie-button" type="submit">Застосувати</button>
            <a href="{{ route('movies.index') }}">Скинути фільтр</a>
        </form>

        <div class="movie-table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Назва</th>
                        <th>Жанр</th>
                        <th>Рік</th>
                        <th>Тривалість</th>
                        <th>Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $i => $movie)
                        <tr>
                            <td>{{ $movies->firstItem() + $i }}</td>
                            <td><a href="{{ route('movies.show', $movie) }}">{{ $movie->title }}</a></td>
                            <td>{{ $movie->genre }}</td>
                            <td>{{ $movie->release_year }}</td>
                            <td>{{ $movie->duration }} хв</td>
                            <td><a href="{{ route('movies.edit', $movie) }}">Редагувати</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Фільмів не знайдено.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $movies->links('movies.pagination') }}
    </div>
@endsection
