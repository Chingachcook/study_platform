<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

    <!-- Useful meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow, noodp">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">

    <title>Результат теста</title>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ url('/login') }}">Войти</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/home') }}">
                                    Главная
                                </a>
                                <a class="dropdown-item" href="{{ url('/user/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ url('/user/logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/home') }}">Модули
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/statistics_modules') }}">Статистика</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    {!! Form::open(['method' => 'GET', 'url' => '/problems', 'class' => 'form-inline my-2 my-lg-0 float-right', 'problem' => 'search'])  !!}
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Поиск" aria-label="Search">
                        <span class="input-group-append">
                                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Поиск</button>
                            </span>
                    </form>
                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
    </nav>
</header>
<br>
<br>
<section class="module">
    <div class="container">
        <h1 align="center">Ваш результат </h1>
        <br>
        <div id="myfirstchart" style="height: 250px;"></div>
    </div>
</section>

<script>
    new Morris.Donut({
        element: 'myfirstchart',
        data: [
            <?php echo '{value: '.$ok.', label: \'Правильно\'},';
            echo '{value: '.$not_ok.', label: \'Неправильно\'}'
            ?>
        ],
        formatter: function (x) { return x + "%"}
    }).on('click', function(i, row){
        console.log(i, row);
    });
</script>
<!-- JS -->
<script src="js/main.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>