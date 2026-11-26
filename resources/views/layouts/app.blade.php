<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Кінотеатр')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            color: #222;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background:
                radial-gradient(circle at center, rgba(0, 0, 0, 0.2) 30%, rgba(0, 0, 0, 0.85) 100%),
                url('{{ asset('images/cinema-bg.jpg') }}') center / cover fixed no-repeat;
        }
        nav {
            background: #5b1a2b;
            padding: 15px 20px;
            display: flex;
            align-items: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .site-nav {
            flex-wrap: wrap;
            gap: 8px 16px;
            position: relative;
            z-index: 20;
            color: #fff;
        }

        .site-nav .nav-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px 16px;
        }

        .site-nav a {
            margin-right: 0;
        }

        .site-nav details {
            position: relative;
        }

        .site-nav summary {
            padding: 6px 0;
            cursor: pointer;
        }

        .site-nav .site-submenu {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 195px;
            padding: 6px;
            border: 1px solid #724252;
            border-radius: 6px;
            background: #301e27;
        }

        .nav-right .site-submenu {
            left: auto;
            right: 0;
        }

        .site-submenu a,
        .site-submenu button {
            display: block;
            width: 100%;
            padding: 8px 10px;
            text-align: left;
        }

        .site-submenu a:hover,
        .site-submenu button:hover {
            background: #5b1a2b;
        }

        .site-submenu button {
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .site-nav .nav-right {
                width: 100%;
                margin-left: 0;
            }

            .nav-right .site-submenu {
                left: 0;
                right: auto;
            }
        }
        main {
            flex: 1;
            width: 100%;
            max-width: 1300px;
            box-sizing: border-box;
            margin: 40px auto;
            padding: 35px 30px;

            background: rgba(18, 18, 22, 0.85);
            color: #f1f1f1;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
        }

        .account-main {
            max-width: 760px;
        }

        .account-main > header h2 {
            color: inherit;
        }

        .account-form {
            max-width: 420px;
            margin: auto;
            padding: 24px;
            border-radius: 8px;
            background: #fff;
            color: #282029;
        }

        .account-main .form-input {
            color: #1f2937;
            background-color: #fff;
            color-scheme: light;
        }

        .account-main .form-input::placeholder {
            color: #606b7b;
        }

        .account-main button.bg-gray-800 {
            background: #7d2942;
        }

        .account-main button.bg-gray-800:hover {
            background: #963650;
        }
        footer {
            position: sticky;
            bottom: 0;
            z-index: 10;
            flex-shrink: 0;
            background: rgba(20, 20, 20, 0.85);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #bbb;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }
    </style>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')
</head>
<body>
<nav class="site-nav">
    <a href="{{ url('/') }}">Головна</a>
    <details>
        <summary>Афіша</summary>
        <div class="site-submenu">
            <a href="{{ route('movies.index') }}">Усі фільми</a>
            <a href="{{ route('movies.now-playing') }}">Зараз у кіно</a>
            <a href="{{ route('movies.coming-soon') }}">Скоро у прокаті</a>
        </div>
    </details>
    <a href="{{ route('blog.index') }}">Блог</a>
    <a href="{{ route('contact.form') }}">Контакти</a>
    <a href="{{ route('site.about') }}">Про застосунок</a>
    <div class="nav-right">
        @auth
            <details>
                <summary>Керування</summary>
                <div class="site-submenu">
                    <a href="{{ route('movies.admin') }}">Керування фільмами</a>
                    <a href="{{ route('blog.admin') }}">Керування блогом</a>
                    <a href="{{ route('filters.index') }}">Мітки блогу</a>
                    <a href="{{ route('users.index') }}">Користувачі</a>
                    <a href="{{ route('stats.pages') }}">Статистика</a>
                </div>
            </details>
            <details>
                <summary>Обліковий запис</summary>
                <div class="site-submenu">
                    <a href="{{ route('dashboard') }}">Особистий кабінет</a>
                    <a href="{{ route('profile.edit') }}">Мій профіль</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Вийти</button>
                    </form>
                </div>
            </details>
        @endauth
        @guest
            <a href="{{ route('login') }}">Увійти</a>
            <a href="{{ route('register') }}">Реєстрація</a>
        @endguest
    </div>
</nav>

<main class="@yield('main-class')">
    @yield('content')
</main>

<footer>
    Кінотеатр: фільми, сеанси, квитки. &copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського
    <br>Виконав: Чухлєб А.С., група РЕ-31.
</footer>
</body>
</html>
