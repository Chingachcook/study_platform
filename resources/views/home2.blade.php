<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.min.css">

    <!-- Useful meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow, noodp">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">

    <title>Главная</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="">Имя ученика</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Модули
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/statistics_modules') }}">Статистика</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.html">Настройки</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<br>
<br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Library</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>
</div>
<br>
<section class="module">
    <div class="container">
        <h1>Модули для обучения</h1>
        <br>
        <div class="row d-flex align-items-stretch">
            @foreach($modules as $item)
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title">Модуль {{ $item->id }}</h4>
                        <h5 class="card-subtitle mb-2 text-muted">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <a class="btn btn-outline-info btn-block" href="{{ url('/lessons_list/'.$item->id) }}" role="button">Посмотреть</a>
                    </div> 
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </div>
</section>
        
<!-- JS -->
<script src="js/main.js"></script>

</body>
</html>