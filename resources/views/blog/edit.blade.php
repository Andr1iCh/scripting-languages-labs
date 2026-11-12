@extends('layouts.app')
@section('title', 'Редагування запису блогу')
@section('content')
    <h1>Редагування запису блогу</h1>
    <form method="POST" action="{{ route('blog.update', $blog) }}">
        @csrf
        @method('PUT')
        @include('blog._form')
        <button type="submit">Зберегти зміни</button>
    </form>
    <p><a href="{{ route('blog.show', $blog) }}">Повернутися до запису</a></p>
@endsection
