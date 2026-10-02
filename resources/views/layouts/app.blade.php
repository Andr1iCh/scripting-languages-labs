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
        nav    { background: #5b1a2b; padding: 15px 20px; }
        nav a  { color: #fff; text-decoration: none; margin-right: 20px; }
        nav a:hover { text-decoration: underline; }
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
        footer {
            background: rgba(20, 20, 20, 0.85);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #bbb;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<nav>
    <a href="{{ url('/') }}">Головна</a>
    <a href="{{ url('/movies') }}">Фільми</a>
    <a href="{{ url('/now-playing') }}">Зараз у кіно</a>
    <a href="{{ url('/coming-soon') }}">Скоро у прокаті</a>
    <a href="{{ url('/sessions') }}">Сеанси</a>
    <a href="{{ url('/contact') }}">Контакти</a>
</nav>

<main>
    @yield('content')
</main>

<footer>
    Кінотеатр: фільми, сеанси, квитки. &copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського
    <br>Виконав: Чухлєб А.С., група РЕ-31.
</footer>
</body>
</html>
