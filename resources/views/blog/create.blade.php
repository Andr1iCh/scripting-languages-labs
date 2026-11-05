@extends('layouts.app')
@section('title', 'Додати запис блогу')
@section('content')
    <h1>Додати запис блогу</h1>
    <form method="POST" action="{{ route('blog.store') }}">
        @csrf
        @include('blog._form')
        <button type="submit">Створити</button>
    </form>
@endsection
