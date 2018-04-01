<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">

    <!-- Useful meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow, noodp">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">

    <title>Список уроков Модуля</title>
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
                            <a class="nav-link" href="#">Статистика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Настройки</a>
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

    <section class="module_list">
        <div class="container">
            <h1>Список уроков по модулю</h1>
            <br>
            <div class="row align-items-stretch">
                <div class="col-lg-3 col-md-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="..." alt="..." class="img-thumbnail">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 d-flex justify-content-center">
                    <div class="list-group">
                        @foreach($lessons as $item)
                        <a href="{{ url('/lesson/'.$item->id) }}" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Урок {{$item->id}}  </h5>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">{{$item->title}}</p>
                            <small>{{$item->description}}</small>
                        </a>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
        
<!-- JS -->
<script src="js/main.js"></script>

</body>
</html>