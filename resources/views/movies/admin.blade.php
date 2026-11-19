@extends('layouts.app')
@section('title', 'Керування фільмами')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endpush

@section('content')
    <div class="movie-directory">
        <h1>Керування фільмами</h1>

        <form class="movie-filter" method="GET" action="{{ route('movies.admin') }}">
            <div>
                <label for="title">Назва фільму</label>
                <input id="title" name="title" type="text" value="{{ request('title') }}">
            </div>
            <div>
                <label for="director">Режисер</label>
                <input id="director" name="director" type="text" value="{{ request('director') }}">
            </div>
            <div>
                <label for="actorName">Ім’я актора</label>
                <input id="actorName" name="actorName" type="text" value="{{ request('actorName') }}">
            </div>
            <div>
                <label for="actor_id">Актор</label>
                <select id="actor_id" name="actor_id">
                    <option value="">Усі актори</option>
                    @foreach ($actors as $id => $name)
                        <option value="{{ $id }}" @selected(request('actor_id') == $id)>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="sort" value="{{ request('sort') }}">
            <button class="movie-button" type="submit">Застосувати</button>
            <a href="{{ route('movies.admin') }}">Скинути фільтри</a>
        </form>

        @php
            $sort = request('sort') ?: 'title';
            $search = request()->except('sort', 'page');
        @endphp

        <div class="movie-table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>
                            <a href="{{ route('movies.admin', array_merge($search, ['sort' => $sort === 'title' ? '-title' : 'title'])) }}">
                                Назва {{ $sort === 'title' ? '↑' : ($sort === '-title' ? '↓' : '') }}
                            </a>
                        </th>
                        <th>Режисер</th>
                        <th>Рік</th>
                        <th>Актори</th>
                        <th>
                            <a href="{{ route('movies.admin', array_merge($search, ['sort' => $sort === 'actors' ? '-actors' : 'actors'])) }}">
                                Кількість акторів {{ $sort === 'actors' ? '↑' : ($sort === '-actors' ? '↓' : '') }}
                            </a>
                        </th>
                        <th>Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $movie)
                        <tr>
                            <td><a href="{{ route('movies.show', $movie) }}">{{ $movie->title }}</a></td>
                            <td>{{ $movie->director }}</td>
                            <td>{{ $movie->release_year }}</td>
                            <td>{{ $movie->actors->pluck('name')->implode(', ') ?: '—' }}</td>
                            <td>{{ $movie->actors_count }}</td>
                            <td><a href="{{ route('movies.edit', $movie) }}">Редагувати</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="6">Фільмів не знайдено.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $movies->links('movies.pagination') }}
    </div>
@endsection
