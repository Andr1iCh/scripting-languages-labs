@extends('layouts.app')
@section('title', $heading)
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endpush

@section('content')
    <div class="movie-directory">
        <h1>{{ $heading }}</h1>
        @if (request()->routeIs('movies.now-playing'))
            <p>Фільми з каталогу, які вже вийшли.</p>
        @elseif (request()->routeIs('movies.coming-soon'))
            <p>Фільми з майбутньою датою або роком виходу.</p>
        @endif

        @if (session('success'))
            <p class="movie-success" role="status">{{ session('success') }}</p>
        @endif

        @auth
            <p><a class="movie-button" href="{{ route('movies.create') }}">Додати фільм</a></p>
        @endauth

        <form class="movie-filter" method="GET" action="{{ route($listRoute) }}">
            @include('movies._language')
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
            <a href="{{ route($listRoute, ['lang' => $lang]) }}">Скинути фільтр</a>
        </form>

        <div class="movie-table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Кількість акторів</th>
                        <th>Назва</th>
                        <th>Жанр</th>
                        <th>Вихід</th>
                        <th>Тривалість</th>
                        @auth
                            <th>Дії</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $i => $movie)
                        <tr>
                            <td>{{ $movies->firstItem() + $i }}</td>
                            <td>{{ $movie->actors_count }}</td>
                            <td>
                                <a href="{{ route('movies.show', ['movie' => $movie, 'lang' => $lang]) }}">
                                    {{ $movie->translations->first()?->title ?? $movie->title }}
                                </a>
                            </td>
                            <td>{{ $movie->genre }}</td>
                            <td>{{ $movie->release_date?->format('d.m.Y') ?? $movie->release_year }}</td>
                            <td>{{ $movie->duration }} хв</td>
                            @auth
                                <td><a href="{{ route('movies.edit', $movie) }}">Редагувати</a></td>
                            @endauth
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->check() ? 7 : 6 }}">Фільмів не знайдено.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $movies->links('movies.pagination') }}
    </div>
@endsection
