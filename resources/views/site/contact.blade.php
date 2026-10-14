@extends('layouts.app')

@section('title', 'Контакти — ' . $cinemaName)
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
    <section class="contact-hero" aria-labelledby="contact-title">
        <span class="contact-eyebrow">Фільми · Сеанси · Квитки</span>
        <h1 id="contact-title">{{ $cinemaName }}</h1>
        <p>Обирайте фільм та плануйте наступний похід у кіно.</p>
    </section>

    <section class="contact-content" aria-labelledby="form-title">
        <h2 id="form-title">Зв’яжіться з нами</h2>
        <p class="contact-intro">
            Є питання щодо сеансів, квитків або репертуару?
            Надішліть своє запитання чи пропозицію через форму.
        </p>

        {{-- novalidate дозволяє показати повідомлення саме від Laravel. --}}
        <form method="POST" action="{{ route('contact.submit') }}" novalidate>
            @csrf

            <div class="form-field">
                <label for="name">Ваше ім’я</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    placeholder="Введіть ім’я"
                    autocomplete="name"
                    maxlength="255"
                    required
                    class="@error('name') is-invalid @enderror"
                    @error('name') aria-invalid="true" aria-describedby="name-error" @enderror
                >
                @error('name')
                <p id="name-error" class="field-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="email">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    placeholder="example@gmail.com"
                    autocomplete="email"
                    maxlength="255"
                    required
                    class="@error('email') is-invalid @enderror"
                    @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                >
                @error('email')
                <p id="email-error" class="field-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="message">Повідомлення</label>
                <textarea
                    id="message"
                    name="message"
                    rows="5"
                    placeholder="Ваше запитання або пропозиція..."
                    minlength="10"
                    maxlength="5000"
                    required
                    class="@error('message') is-invalid @enderror"
                    aria-describedby="message-hint @error('message') message-error @enderror"
                    @error('message') aria-invalid="true" @enderror
                >{{ old('message') }}</textarea>
                <p id="message-hint" class="field-hint">Від 10 до 5000 символів.</p>
                @error('message')
                <p id="message-error" class="field-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <button class="contact-button" type="submit">Надіслати повідомлення</button>
        </form>
    </section>
@endsection

