@extends('layouts.sample')
@section('title', 'Додати країну')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/country.css') }}">
@endpush
@section('content')
    <div class="country-directory">
    <h1>Додати країну</h1>
    <form method="POST" action="{{ route('country.store') }}">
        @csrf
        @include('country._form')
        <button type="submit">
            Зберегти
        </button>
    </form>
    <p><a href="{{ route('country.index') }}">Повернутися до списку</a></p>
    </div>
@endsection
