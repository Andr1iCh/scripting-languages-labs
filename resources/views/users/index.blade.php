@extends('layouts.app')

@section('title', 'Користувачі')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endpush
@section('content')
    <div class="movie-directory">
        <h1>Користувачі системи</h1>
        <div class="movie-table-wrapper">
            <table class="users-table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Ім'я</th>
                        <th>Зареєстровано</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $i => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->created_at->format('d.m.Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Користувачів немає.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $users->links('movies.pagination', ['itemLabel' => 'користувачів']) }}
    </div>
@endsection
