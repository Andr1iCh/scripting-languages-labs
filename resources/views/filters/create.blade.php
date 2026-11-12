@extends('layouts.app')
@section('title', 'Створення мітки')
@section('content')
    <h1>Створення мітки</h1>
    <form method="POST" action="{{ route('filters.store') }}">
        @csrf
        @include('filters._form')
        <button type="submit">Створити</button>
    </form>
    <p><a href="{{ route('filters.index') }}">Повернутися до переліку</a></p>
@endsection
