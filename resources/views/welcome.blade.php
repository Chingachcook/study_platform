<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>JS Программирование</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-image: url("http://test.stapp.kz/js_background.jpg");
            background-size: 100%;
            color: #fff;
            font-family: 'Roboto Slab', serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            padding: 0 100px;
        }

        .title {
            font-size: 84px;
        }

        p {
            font-size: 23px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <br>
                <a class="btn btn-outline-light" href="{{ url('/login') }}"
                   style="border-radius: 20px; vertical-align: baseline; float: right; margin-right: 50px;">Войти</a>
            @else
                <a class="btn btn-outline-light" href="{{ url('/register') }}"
                   style="border-radius: 20px; vertical-align: baseline; float: right; margin-right: 50px;">Регистрация</a>
                <a class="btn btn-outline-light" href="{{ url('/login') }}"
                   style="border-radius: 20px; vertical-align: baseline; float: right; margin-right: 20px;">Войти</a>
            @endauth
        </div>
    @endif

    <div class="container">
        <div class="title text-center">
            JS СОЗДАНИЕ 2D ИГР
            <p>
                Эта платформа создана для обучения программированию,
                на основе создания динамических компьютерных игр
            </p>
        </div>
    </div>
</div>
</body>

</html>
