@extends('layouts.app')
@section('title', 'Блог')
@section('main-class', 'blog-page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endpush
@section('content')
    <h1>Блог</h1>
    <div class="blog-grid">
        @forelse ($blogs as $blog)
            @include('blog._item', ['blog' => $blog])
        @empty
            <p>Записів поки немає.</p>
        @endforelse
    </div>
    {{ $blogs->links() }}
@endsection
