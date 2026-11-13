@extends('layouts.app')
@section('title', 'Довідник міток')
@section('content')
    <h1>Довідник міток</h1>
    <p><a href="{{ route('filters.create') }}">Створити мітку</a></p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Назва</th>
                <th>Опис</th>
                <th>Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filters as $i => $filter)
                <tr>
                    <td>{{ $filters->firstItem() + $i }}</td>
                    <td>{{ $filter->filter_name }}</td>
                    <td>{{ $filter->filter_description }}</td>
                    <td>
                        <a href="{{ route('filters.edit', $filter) }}">Редагувати</a>
                        <form method="POST" action="{{ route('filters.destroy', $filter) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $filters->links() }}
@endsection
