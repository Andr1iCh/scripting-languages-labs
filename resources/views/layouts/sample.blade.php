<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1">
    <title>@yield('title', 'Лабораторний
практикум')</title>
    @stack('styles')
</head>
<body>
<nav>
    <a href="{{ url('/') }}">Головна</a>
    <a href="{{ url('/about') }}">Про застосунок</a>
    <a href="{{ url('/contact') }}">Контакти</a>
</nav>
<main>
    @yield('content')
</main>
<footer>
    &copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського
</footer>
</body>
</html>
