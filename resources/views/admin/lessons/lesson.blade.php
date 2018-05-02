<!DOCTYPE html>
<html lang="en">
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
</head>
<body>

<section class="lesson">
    <div class="container">
        <br>
        <a href="{{ url('/admin/modules') }}" class="btn btn-warning btn-sm" title="Назад к Урокам">
            <i class="fa fa-home" aria-hidden="true"></i> Назад
        </a>
        <hr>
        <div class="row d-flex">
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                <a title="Добавить Документ" class="btn btn-danger btn-block align-self-center btn-lesson" href="{{ url('/admin/'.$id.'/documents')}}">Документ</a>
                <span>&nbsp;&nbsp;&nbsp;</span>
                <a title="Добавить Видео" class="btn btn-info btn-block align-self-center btn-lesson" href="{{ url('/admin/'.$id.'/videos')}}">Видео</a>
                <span>&nbsp;&nbsp;&nbsp;</span>
                <a title="Добавить Тест" class="btn btn-warning btn-block align-self-center btn-lesson" href="{{ url('/admin/'.$id.'/tests')}}">Тест</a>
            </div>
        </div>
        <br>
    </div>
</section>

<!-- JS -->
<script src="js/main.js"></script>

</body>
</html>