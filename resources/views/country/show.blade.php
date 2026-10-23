@extends('layouts.sample')
@section('title', $country->name)
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/country.css') }}">
@endpush
@section('content')
    <div class="country-directory">
    <h1>{{ $country->name }}</h1>
    <p>
        <strong>Код:</strong>
        {{ $country->code }}
    </p>
    <p>
        <strong>Населення:</strong>
        {{ number_format($country->population,0, ',', ' ') }}
    </p>
    <p>
        <a href="{{ route('country.edit', $country) }}">
            Редагувати
        </a>
    </p>
    <p>
        <a href="{{ route('country.index') }}">
            Повернутися до списку
        </a>
    </p>
    <form
        method="POST"
        action="{{ route('country.destroy', $country) }}"
    >
        @csrf
        @method('DELETE')
        <button type="submit">
            Видалити
        </button>
    </form>
    </div>
@endsection
