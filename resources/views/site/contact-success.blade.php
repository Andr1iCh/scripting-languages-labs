@extends('layouts.app')

@section('title', 'Повідомлення прийнято — ' . $cinemaName)
@section('main-class', 'contact-page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('navigation')
    <span class="cinema-brand">{{ $cinemaName }}</span>
    <div class="nav-right">
        <a href="{{ url('/') }}">На головну</a>
        <a href="{{ url('/about') }}">Про застосунок</a>
    </div>
@endsection

@section('content')
    <section class="contact-content contact-success" aria-labelledby="success-title">
        <div class="success-mark" aria-hidden="true">✓</div>
        <h1 id="success-title">Ваше повідомлення успішно прийнято</h1>
        <p class="contact-intro">Дякуємо за звернення, {{ $contact['name'] }}!</p>

        <dl class="contact-summary">
            <dt>Email</dt>
            <dd>{{ $contact['email'] }}</dd>
            <dt>Номер телефону</dt>
            <dd>{{ $contact['phone'] }}</dd>
            <dt>Ваше повідомлення</dt>
            <dd class="submitted-message">{{ $contact['message'] }}</dd>
        </dl>

        <a class="contact-button" href="{{ route('contact.form') }}">Повернутися до контактів</a>
    </section>
@endsection

