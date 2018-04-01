<!DOCTYPE html>
<html lang="en">
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

    <title>Урок number</title>
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

<section class="test">
    <div class="container">
        <form class="form-test">
            <div class="form-group">
                <div class="question">
                    <p>
                        <strong>Q1</strong>: Mary is English. She was born in London</p>
                    <label>
                        <input type="radio" name="one" value="a">Mary was born in England</label>
                    <label>
                        <input type="radio" name="one" value="b">Mary, who is English, was born in London</label>
                    <label>
                        <input type="radio" name="one" value="c">English Mary was born in London</label>
                    <label>
                        <input type="radio" name="one" value="d">London Mary is English born</label>
                </div>
                <div class="question">
                    <p>
                        <strong>Q2</strong>: Mary is English. She was born in London</p>
                    <label>
                        <input type="radio" name="two" value="a">Mary was born in England</label>
                    <label>
                        <input type="radio" name="two" value="b">Mary, who is English, was born in London</label>
                    <label>
                        <input type="radio" name="two" value="c">English Mary was born in London</label>
                    <label>
                        <input type="radio" name="two" value="d">London Mary is English born</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
        <img src="assets/img/right.png" alt="">
    </div>
</section>
        
<!-- JS -->
<script src="js/main.js"></script>

</body>
</html>