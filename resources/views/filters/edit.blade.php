@extends('layouts.app')
@section('title', 'Редагування мітки')
@section('content')
    <h1>Редагування мітки</h1>
    <form method="POST" action="{{ route('filters.update', $filter) }}">
        @csrf
        @method('PUT')
        @include('filters._form')
        <button type="submit">Зберегти зміни</button>
    </form>
    <p><a href="{{ route('filters.index') }}">Повернутися до переліку</a></p>
@endsection
