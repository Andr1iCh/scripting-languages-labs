@extends('layouts.app')
@php
    $heading = match (request()->route()?->getName()) {
        'login' => 'Вхід',
        'register' => 'Реєстрація',
        'password.request' => 'Відновлення пароля',
        'password.reset' => 'Новий пароль',
        'password.confirm' => 'Підтвердження пароля',
        default => 'Обліковий запис',
    };
@endphp
@section('title', $heading)
@section('main-class', 'account-main')

@section('content')
    <div class="account-form">
        <h1 class="mb-5 text-xl font-semibold">{{ $heading }}</h1>
        {{ $slot }}
    </div>
@endsection
