@extends('layouts.app')
@section('title', 'Адміністрування блогу')
@push('styles')
    <style>
        .blog-admin-filters {
            display: flex;
            flex-wrap: wrap;
            align-items: end;
            gap: 8px 12px;
            margin-top: 12px;
        }

        .blog-admin-filters label {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .blog-admin-filters input,
        .blog-admin-filters select,
        .blog-admin-filters button {
            padding: 4px 8px;
            border: 1px solid #666;
            border-radius: 4px;
            background: #24242a;
            color: inherit;
        }

        .blog-admin-table {
            margin-top: 12px;
        }

        .blog-admin-table th,
        .blog-admin-table td {
            padding: 6px 10px;
            text-align: left;
        }

        .blog-admin-table th:first-child,
        .blog-admin-table td:first-child {
            padding-left: 0;
        }

        .blog-admin-table td form {
            margin-top: 4px;
        }
    </style>
@endpush
@section('content')
    <h1>Адміністрування блогу</h1>
    <p>
        <a href="{{ route('blog.create') }}">
            Додати запис
        </a>
    </p>
    <form class="blog-admin-filters" method="GET" action="{{ route('blog.admin') }}">
        <label for="title">
            Заголовок
            <input type="text" id="title" name="title"
                   value="{{ request('title') }}" placeholder="Пошук за заголовком">
        </label>

        <label for="categoryName">
            Назва категорії
            <input type="text" id="categoryName" name="categoryName"
                   value="{{ request('categoryName') }}" placeholder="Назва категорії">
        </label>

        <label for="category_id">
            Категорія
            <select id="category_id" name="category_id">
                <option value="">Усі категорії</option>
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}" @selected(request('category_id') == $id)>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </label>

        <label for="filter_id">
            Мітка
            <select id="filter_id" name="filter_id">
                <option value="">Усі мітки</option>
                @foreach ($filters as $id => $name)
                    <option value="{{ $id }}" @selected(request('filter_id') == $id)>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </label>

        <input type="hidden" name="sort" value="{{ request('sort') }}">
        <button type="submit">Застосувати</button>
        <a href="{{ route('blog.admin') }}">Скинути фільтри</a>
    </form>

    @php
        $currentSort = request('sort');

        $nextTitleSort = $currentSort === 'title' ? '-title' : 'title';
        $nextCategorySort = $currentSort === 'categoryName' ? '-categoryName' : 'categoryName';
        $nextCreatedSort = $currentSort === 'created' ? '-created' : 'created';
    @endphp
    <table class="blog-admin-table">
        <thead>
        <tr>
            <th>№</th>
            <th>
                <a href="{{ route('blog.admin', array_merge(
                    request()->except('sort', 'page'),
                    ['sort' => $nextTitleSort]
                )) }}">
                    Заголовок
                    @if ($currentSort === 'title')
                        ↑
                    @elseif ($currentSort === '-title')
                        ↓
                    @endif
                </a>
            </th>
            <th>
                <a href="{{ route('blog.admin', array_merge(
                    request()->except('sort', 'page'),
                    ['sort' => $nextCategorySort]
                )) }}">
                    Категорія
                    @if ($currentSort === 'categoryName')
                        ↑
                    @elseif ($currentSort === '-categoryName')
                        ↓
                    @endif
                </a>
            </th>
            <th>Мітки</th>
            <th>
                <a href="{{ route('blog.admin', array_merge(
                    request()->except('sort', 'page'),
                    ['sort' => $nextCreatedSort]
                )) }}">
                    Дата
                    @if ($currentSort === 'created')
                        ↑
                    @elseif ($currentSort === '-created')
                        ↓
                    @endif
                </a>
            </th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($blogs as $i => $blog)
            <tr>
                <td>{{ $blogs->firstItem() + $i }}</td>
                <td>
                    <a href="{{ route('blog.show', $blog) }}">
                        {{ $blog->title }}
                    </a>
                </td>
                <td>
                    {{ $blog->category?->category_name ?? '—' }}
                </td>
                <td>
                    @forelse ($blog->filters as $filter)
                        <span class="tag">
                            {{ $filter->filter_name }}
                        </span>
                    @empty
                        —
                    @endforelse
                </td>
                <td>
                    {{ $blog->dt_created->format('d.m.Y') }}
                </td>
                <td>
                    <a href="{{ route('blog.edit', $blog) }}">
                        Редагувати
                    </a>
                    <form method="POST"
                          action="{{ route('blog.destroy', $blog) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Записів немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $blogs->links() }}
@endsection
