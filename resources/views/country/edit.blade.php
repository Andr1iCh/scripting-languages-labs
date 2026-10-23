@extends('layouts.sample')
@section('title', 'Редагування країни')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/country.css') }}">
@endpush
@section('content')
    <div class="country-directory">
    <h1>Редагування країни</h1>
    <form
        method="POST"
        action="{{ route('country.update', $country) }}"
    >
        @csrf
        @method('PUT')
        @include('country._form')
        <button type="submit">
            Зберегти зміни
        </button>
    </form>
    <p><a href="{{ route('country.index') }}">Повернутися до списку</a></p>
    </div>
@endsection
